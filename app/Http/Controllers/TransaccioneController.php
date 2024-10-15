<?php

namespace App\Http\Controllers;

use App\Models\Transaccione;
use App\Models\EntradasEvento;
use App\Models\Compra;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TransaccioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\MisEntradasController;

class TransaccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $transacciones = Transaccione::paginate();

        return view('admin.transaccione.index', compact('transacciones'))
            ->with('i', ($request->input('page', 1) - 1) * $transacciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $transaccione = new Transaccione();

        return view('admin.transaccione.create', compact('transaccione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransaccioneRequest $request): RedirectResponse
    {
        Transaccione::create($request->validated());

        return Redirect::route('transacciones.index')
            ->with('success', 'Transaccione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): RedirectResponse
    {
        $transaccione = Transaccione::find($id);
       
        $entradasevento = EntradasEvento::where('evento_id', $transaccione->evento_id)->where('user_id', $transaccione->user_id)->get();
        
        if($entradasevento->count()>0 )
        {
            return Redirect::route('MisEntradas.index')->with('error', 'Usted ya cuenta con una entrada.');
        }
        else
        {
            $curl = curl_init();
            curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => [
                "x-api-key: 41914691-abaf-448c-810c-d2c0ae13d19e"
            ],
            CURLOPT_URL => "https://payment-api.khipu.com/v3/payments/" . $transaccione->payment_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            ]);

            $response = curl_exec($curl);
            $error = curl_error($curl);

            curl_close($curl);

            if ($error) {
            //echo "cURL Error #:" . $error;
            } else 
            {
                $json=json_decode($response);

                if($json!=null){

                    Transaccione::where('id',$transaccione->id)->update([
                        
                        'status'=>$json->status, 
                        'status_detail'=>$json->status_detail, 
                        'get_payment'=>$response]);
                    
                    $transaccione = Transaccione::find($id);

                    if($transaccione->status='done' && $transaccione->status_detail=='normal')
                    {
                        $compra=Compra::where('id',$transaccione->compra_id)->update([
                            'estado_id'=>2
                        ]);

                        EntradasEvento::create([
                            'tipo_entrada_id'=>1,                            
                            'evento_id' => $transaccione->evento_id, 
                            'user_id' => $transaccione->user_id]);

                        return Redirect::route('MisEntradas.index')->with('success', 'Entrada comprada.');
                        
                    }else{
                        if($transaccione->status=='marked-paid-by-receiver' || $transaccione->status=='marked-as-abuse' || $transaccione->status=='marked-paid-by-receiver')
                        {
                            
                            $compra=Compra::where('id',$transaccione->compra_id)->update([
                                'estado_id'=>4
                            ]);
                        }


                    }
                }
            }

            $transaccione = Transaccione::find($id);

           
        
            return Redirect::route ('transacciones.index')->with('success', 'La transacción tiene estado '. $transaccione->status);
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $transaccione = Transaccione::find($id);

       return view('admin.transaccione.edit', compact('transaccione'));
       
    }

    public function comprobante($id): View
    {
      $t = Transaccione::where('compra_id',$id)->get();
       
      return view('admin.transaccione.comprobante', compact('t'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaccioneRequest $request, Transaccione $transaccione): RedirectResponse
    {
        $transaccione->update($request->validated());

        return Redirect::route('transacciones.index')
            ->with('success', 'Transaccione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Transaccione::find($id)->delete();

        return Redirect::route('transacciones.index')
            ->with('success', 'Transaccione deleted successfully');
    }
}
