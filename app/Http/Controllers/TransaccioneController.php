<?php

namespace App\Http\Controllers;

use App\Models\Transaccione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TransaccioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\EntradasEvento;
use App\Models\Evento;
use App\Models\User;
use App\Http\Controllers\MisEntradasController;

class TransaccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $transacciones = Transaccione::paginate();

        return view('transaccione.index', compact('transacciones'))
            ->with('i', ($request->input('page', 1) - 1) * $transacciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $transaccione = new Transaccione();

        return view('transaccione.create', compact('transaccione'));
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
        } else {
        //echo $response;

        $json=json_decode($response);

        if($json!=null){


        Transaccione::where('id',$transaccione->id)->update([
            
            'status'=>$json->status, 
            'status_detail'=>$json->status_detail, 
            'get_payment'=>$response]);
        
        $transaccione = Transaccione::find($id);
        $entradasevento = EntradasEvento::where('evento_id', $transaccione->evento_id)
         ->where('user_id', $transaccione->user_id)->get();

        if($entradasevento->count()>0 )
         {
             return Redirect::route('MisEntradas.index')->with('error', 'Usted ya cuenta con una entrada.');
         }
        else{
        if($transaccione->status='normal')
        {
            EntradasEvento::create([
                        'estado'=>1, 
                         'evento_id' => $transaccione->evento_id, 
                         'user_id' => $transaccione->user_id, 
                         'fecha_compra' => now()->format('Y-m-d')
                     ]);

        return Redirect::route('MisEntradas.index')->with('success', 'Entrada comprada.');

        }
     }
    }

  

    }
    
        return Redirect::route ('transacciones', compact('transaccione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $transaccione = Transaccione::find($id);

        return view('transaccione.edit', compact('transaccione'));
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
