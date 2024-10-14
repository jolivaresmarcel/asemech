<?php

namespace App\Http\Controllers;

use App\Models\Participacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ParticipacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ParticipacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $participaciones = Participacione::paginate();

        return view('participacione.index', compact('participaciones'))
            ->with('i', ($request->input('page', 1) - 1) * $participaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $participacione = new Participacione();

        return view('participacione.create', compact('participacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ParticipacioneRequest $request): RedirectResponse
    {
        Participacione::create($request->validated());

        return Redirect::route('participaciones.index')
            ->with('success', 'Participacione created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $participacione = Participacione::find($id);

        return view('participacione.show', compact('participacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $participacione = Participacione::find($id);

        return view('participacione.edit', compact('participacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParticipacioneRequest $request, Participacione $participacione): RedirectResponse
    {
        $participacione->update($request->validated());

        return Redirect::route('participaciones.index')
            ->with('success', 'Participacione updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Participacione::find($id)->delete();

        return Redirect::route('participaciones.index')
            ->with('success', 'Participacione deleted successfully');
    }
}
