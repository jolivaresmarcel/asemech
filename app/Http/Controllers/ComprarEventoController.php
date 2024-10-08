<?php

namespace App\Http\Controllers;

use App\Models\Evento;
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

        return view('ComprarEventos.show', compact('evento'));
    }

    public function comprar($id): View
    {
        $evento = Evento::find($id);

        return view('ComprarEventos.show', compact('evento'));
    }
   

}
