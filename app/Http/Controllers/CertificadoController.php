<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CertificadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $certificados = Certificado::paginate();

        return view('certificado.index', compact('certificados'))
            ->with('i', ($request->input('page', 1) - 1) * $certificados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $certificado = new Certificado();

        return view('certificado.create', compact('certificado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificadoRequest $request): RedirectResponse
    {
        Certificado::create($request->validated());

        return Redirect::route('certificados.index')
            ->with('success', 'Certificado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $certificado = Certificado::find($id);

        return view('certificado.show', compact('certificado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $certificado = Certificado::find($id);

        return view('certificado.edit', compact('certificado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificadoRequest $request, Certificado $certificado): RedirectResponse
    {
        $certificado->update($request->validated());

        return Redirect::route('certificados.index')
            ->with('success', 'Certificado updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Certificado::find($id)->delete();

        return Redirect::route('certificados.index')
            ->with('success', 'Certificado deleted successfully');
    }
}
