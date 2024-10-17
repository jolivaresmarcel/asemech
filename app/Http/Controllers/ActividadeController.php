<?php

namespace App\Http\Controllers;

use App\Models\Actividade;
use App\Models\Evento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ActividadeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ActividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $actividades = Actividade::paginate();

        return view('actividade.index', compact('actividades'))
            ->with('i', ($request->input('page', 1) - 1) * $actividades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id): View
    {
        $evento = Evento::find($id);
        $actividade = new Actividade();

        return view('actividade.create', compact('actividade', 'evento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActividadeRequest $request)//:view//: RedirectResponse
    {
        Actividade::create($request->validated());
        $id=$request->evento_id;
        $actividades = Actividade::where('evento_id', $id)->get();
        $evento = Evento::find($id);

         return view('admin.evento.show', compact('evento','actividades'))
             ->with('success', 'Operación realizada.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $actividade = Actividade::find($id);

        return view('actividade.show', compact('actividade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $actividade = Actividade::find($id);

        return view('actividade.edit', compact('actividade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActividadeRequest $request, Actividade $actividade): view
    {
        $actividade->update($request->validated());

        $id=$request->evento_id;
        $actividades = Actividade::where('evento_id', $id)->get();
        $evento = Evento::find($id);

         return view('admin.evento.show', compact('evento','actividades'))
             ->with('success', 'Operación realizada.');


       

        // return Redirect::route('actividades.index')
        //     ->with('success', 'Actividade updated successfully');
    }

    public function destroy($id): view
    {
        $actividades = Actividade::find($id);
        Actividade::find($id)->delete();

        $id=$actividades->evento_id;
        $actividades = Actividade::where('evento_id', $id)->get();
        $evento = Evento::find($id);

         return view('admin.evento.show', compact('evento','actividades'))
             ->with('success', 'Operación realizada.');

        // return Redirect::route('actividades.index')
        //     ->with('success', 'Actividade deleted successfully');
    }
}
