<?php

namespace App\Http\Controllers;

use App\Models\TiposEntrada;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposEntradaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TiposEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposEntradas = TiposEntrada::paginate();

        return view('tipos-entrada.index', compact('tiposEntradas'))
            ->with('i', ($request->input('page', 1) - 1) * $tiposEntradas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposEntrada = new TiposEntrada();

        return view('tipos-entrada.create', compact('tiposEntrada'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiposEntradaRequest $request): RedirectResponse
    {
        TiposEntrada::create($request->validated());

        return Redirect::route('tipos-entradas.index')
            ->with('success', 'Operación realizada.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tiposEntrada = TiposEntrada::find($id);

        return view('tipos-entrada.show', compact('tiposEntrada'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposEntrada = TiposEntrada::find($id);

        return view('tipos-entrada.edit', compact('tiposEntrada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiposEntradaRequest $request, TiposEntrada $tiposEntrada): RedirectResponse
    {
        $tiposEntrada->update($request->validated());

        return Redirect::route('tipos-entradas.index')
            ->with('success', 'Operación realizada');
    }

    public function destroy($id): RedirectResponse
    {
        TiposEntrada::find($id)->delete();

        return Redirect::route('tipos-entradas.index')
            ->with('success', 'Operación realizada');
    }
}
