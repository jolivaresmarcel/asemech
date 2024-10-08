<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
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

        return view('ComprarEventos.index', compact('eventos'))
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


        return view('ComprarEventos.show', compact('evento', 'entradasevento'));
    }

    public function comprar($id,$user_id) 
    {
        $evento = Evento::find($id);
        $user = User::find($user_id);
        $entradasevento = EntradasEvento::where('evento_id', $evento->id)
        ->where('user_id', $user_id)->get();

       if($entradasevento->count()>0 )
        {
            return Redirect::route('ComprarEventos.index')->with('error', 'Usted ya cuenta con una entrada.');
        }
       else{
        EntradasEvento::create([
            'estado'=>1, 
            'evento_id' => $evento->id, 
            'user_id' => $user->id, 
            'fecha_compra' => now()->format('Y-m-d')
        ]);
        return Redirect::route('ComprarEventos.index')->with('success', 'Entrada comprada.');

       }
       
   
//        return ($evento.'\n '. $user_id);
    }
   

}
