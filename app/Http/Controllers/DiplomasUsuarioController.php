<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiplomaRequest;
use App\Models\DiplomasUsuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DiplomasUsuarioRequest;
use App\Models\Diploma;
use App\Models\EntradasEvento;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class DiplomasUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Diploma $diploma): View   
    {
    
        $diplomasUsuarios = DiplomasUsuario::paginate();

        if($diplomasUsuarios->count()>0)
            $id=$diplomasUsuarios[0]->diploma_id;
        else
            $id=0;

        return view('admin.diplomas-usuario.index', compact('diplomasUsuarios', 'id'))
            ->with('i', ($request->input('page', 1) - 1) * $diplomasUsuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id): View
    {       
        return view('admin.diplomas-usuario.create', compact('diplomasUsuario', 'evento', 'diploma', 'eventoEntradas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiplomasUsuarioRequest $request): RedirectResponse
    {
        DiplomasUsuario::create($request->validated());

        return Redirect::route('diplomas-usuarios.index')
            ->with('success', 'Operación realizada.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $diplomasUsuario = DiplomasUsuario::find($id);

        return view('admin.diplomas-usuario.show', compact('diplomasUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $diplomasUsuario = DiplomasUsuario::find($id);

        return view('admin.diplomas-usuario.edit', compact('diplomasUsuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiplomasUsuarioRequest $request, DiplomasUsuario $diplomasUsuario): RedirectResponse
    {
        $diplomasUsuario->update($request->validated());

        return Redirect::route('diplomas-usuarios.index')
            ->with('success', 'Operación realizada');
    }

    public function publicar($id): RedirectResponse
    {
        $diplomasUsuario = DiplomasUsuario::find($id);
        $diplomasUsuario->update(['publicado'=>1]);

        return Redirect::route('diplomas-usuarios.index')
            ->with('success', 'Diploma publicado');
    }

    public function destroy($id): RedirectResponse
    {
        DiplomasUsuario::find($id)->delete();

        return Redirect::route('diplomas-usuarios.index')
            ->with('success', 'Operación realizada');
    }

    public function DownloadDiploma($id)
    {
        $diplomasUsuario = DiplomasUsuario::find($id);
        $diploma = Diploma::find($diplomasUsuario->diploma_id);

        //$parrafo2=Str::replace('{{rut}}',$diplomasUsuario->user->rut, $diploma->parrafo_2);
        $parrafo_2=Str::replace('{{rut}}',$diplomasUsuario->user->rut, $diploma->parrafo_2);
        $parrafo_2=Str::replace('{{nota}}',$diplomasUsuario->nota, $parrafo_2);
        $parrafo_2=Str::replace('{{asistencia}}',$diplomasUsuario->asistencia, $parrafo_2);
        $parrafo_2=Str::replace('{{evento}}',$diplomasUsuario->evento->titulo, $parrafo_2);

        $diplomasUsuario->diploma->parrafo_2=$parrafo_2;

        $pdf = Pdf::loadView('admin.diploma.diploma', compact('diploma', 'diplomasUsuario'));
        $pdf->set_paper ('a4','landscape');
        return $pdf->stream('diploma.pdf');

    }

    public function ListarNomina($a): View   
    {
    
        $diplomasUsuarios = DiplomasUsuario::where('diploma_id', $a)->paginate();

        if($diplomasUsuarios->count()>0)
            $id=$diplomasUsuarios[0]->diploma_id;
        else
            $id=0;

        return view('admin.diplomas-usuario.index', compact('diplomasUsuarios', 'id'));
         //   ->with('i', ($request->input('page', 1) - 1) * $diplomasUsuarios->perPage());
    }


}
