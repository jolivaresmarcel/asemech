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
class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $eventos = Evento::paginate();

        return view('admin.evento.index', compact('eventos'))
            ->with('i', ($request->input('page', 1) - 1) * $eventos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $evento = new Evento();

        return view('admin.evento.create', compact('evento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventoRequest $request): RedirectResponse
    {
        // Evento::create($request->validated());

        // return Redirect::route('eventos.index')
        //     ->with('success', 'Evento created successfully.');


        $request->validated();

        $validatedData = $request->validate([
         'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('foto')->getClientOriginalName();
        $file = $request->file('foto')->store('images', ['disk' => 'public']);

        Evento::create([
            'titulo' => $request->titulo, 
            'descripcion' => $request->descripcion, 
            'terminos'  => $request-> terminos, 
            'foto'  => $file, 
            'inicio'  => $request-> inicio, 
            'termino'  => $request-> termino, 
            'cupos'  => $request->cupos, 
            'pucbicar' => $request->pucbicar, 
            'lugar' => $request->lugar, 
            'valor'  => $request-> valor
        ]);

        return Redirect::route('eventos.index')
            ->with('success', 'El evento fue creado.');


    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $evento = Evento::find($id);

        return view('admin.evento.show', compact('evento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $evento = Evento::find($id);

        return view('admin.evento.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventoRequest $request, Evento $evento): RedirectResponse
    {
        // $evento->update($request->validated());

        // return Redirect::route('eventos.index')
        //     ->with('success', 'Evento updated successfully');
        
        $request->validated();

        $validatedData = $request->validate([
         'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('foto')->getClientOriginalName();
        $file = $request->file('foto')->store('images', ['disk' => 'public']);

        $evento->update([
            'titulo' => $request->titulo, 
            'descripcion' => $request->descripcion, 
            'terminos'  => $request-> terminos, 
            'foto'  => $file, 
            'inicio'  => $request-> inicio, 
            'termino'  => $request-> termino, 
            'cupos'  => $request->cupos, 
            'pucbicar' => $request->pucbicar, 
            'lugar' => $request->lugar, 
            'valor'  => $request-> valor
        ]);

        return Redirect::route('eventos.index')
            ->with('success', 'El evento fue actualizado.');
    }

    public function destroy($id): RedirectResponse
    {
        Evento::find($id)->delete();

        return Redirect::route('eventos.index')
            ->with('success', 'Evento deleted successfully');
    }

    // public function generate_UUID(Request $request)
    // {
    //     $uuid = Str::uuid()->toString();
    //     return $uuid;


    // }

}
