<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use App\Models\Transaccione;
use Illuminate\Support\Facades\Auth;
use App\Models\EntradasEvento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EventoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
//use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class ComprarEventoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $eventos = Evento::paginate();

        return view('Users.ComprarEventos.index', compact('eventos'))
            ->with('i', ($request->input('page', 1) - 1) * $eventos->perPage());
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $evento = Evento::find($id);
        $user = Auth::user();

        $entradasevento = EntradasEvento::where('evento_id', $evento->id)
        ->where('user_id', $user->id)->get();


        return view('Users.ComprarEventos.show', compact('evento', 'entradasevento'));
    }

    public function comprar($id,$user_id) 
    {
         $evento = Evento::find($id);
         $user = User::find($user_id);



      $transaccion=Transaccione::create([
            'payment_id'=>'1', 
            'evento_id' => $evento->id, 
            'user_id' => $user->id, 
            'status'=>'pending', 
            'status_detail'=>'pending']);
           


    //     $entradasevento = EntradasEvento::where('evento_id', $evento->id)
    //     ->where('user_id', $user_id)->get();

    //    if($entradasevento->count()>0 )
    //     {
    //         return Redirect::route('ComprarEventos.index')->with('error', 'Usted ya cuenta con una entrada.');
    //     }
    //    else{
    //     EntradasEvento::create([
    //         'estado'=>1, 
    //         'evento_id' => $evento->id, 
    //         'user_id' => $user->id, 
    //         'fecha_compra' => now()->format('Y-m-d')
    //     ]);
    //     return Redirect::route('ComprarEventos.index')->with('success', 'Entrada comprada.');

/**
 * Requires libcurl
 */
       
        $curl = curl_init();

        $payload = array(
        "amount" => $evento->valor,
        "currency" => "CLP",
        "subject" => "Cobro de prueba",
        "return_url"=>"http://asemech-dashboard.test/transacciones/".$transaccion->id
        );
        
        curl_setopt_array($curl, [
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-api-key: 41914691-abaf-448c-810c-d2c0ae13d19e"
        ],
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_URL => "https://payment-api.khipu.com/v3/payments",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        ]);
        
        $response = curl_exec($curl);
        $error = curl_error($curl);
        
        curl_close($curl);
        
        if ($error) {
        echo "cURL Error #:" . $error;
        } else {
        echo $response;

        $json = json_decode($response);

        Transaccione::where('id',$transaccion->id)->update([
            'payment_id'=>$json->payment_id, 
            'evento_id' => $evento->id, 
            'user_id' => $user->id, 
            'status'=>'pending', 
            'status_detail'=>'pending', 
            'create_payment'=>$response]);

            return Redirect($json->payment_url);
        }

       
       return ($response."Error : ".$error);
    }
   

}
