<?php

namespace App\Http\Controllers;

use App\Models\TiposCompra;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposCompraRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TiposCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposCompras = TiposCompra::paginate();

        return view('tipos-compra.index', compact('tiposCompras'))
            ->with('i', ($request->input('page', 1) - 1) * $tiposCompras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposCompra = new TiposCompra();

        return view('tipos-compra.create', compact('tiposCompra'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiposCompraRequest $request): RedirectResponse
    {
        TiposCompra::create($request->validated());

        return Redirect::route('tipos-compras.index')
            ->with('success', 'TiposCompra created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tiposCompra = TiposCompra::find($id);

        return view('tipos-compra.show', compact('tiposCompra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposCompra = TiposCompra::find($id);

        return view('tipos-compra.edit', compact('tiposCompra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiposCompraRequest $request, TiposCompra $tiposCompra): RedirectResponse
    {
        $tiposCompra->update($request->validated());

        return Redirect::route('tipos-compras.index')
            ->with('success', 'TiposCompra updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TiposCompra::find($id)->delete();

        return Redirect::route('tipos-compras.index')
            ->with('success', 'TiposCompra deleted successfully');
    }
}
