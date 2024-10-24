<?php

namespace App\Http\Controllers;

use App\Models\Diploma;
use App\Models\Evento;
use App\Models\EntradasEvento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DiplomaRequest;
use App\Models\DiplomasUsuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $diplomas = Diploma::paginate();

        return view('admin.diploma.index', compact('diplomas'))
            ->with('i', ($request->input('page', 1) - 1) * $diplomas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $diploma = new Diploma();
        $evento = Evento::all();

        return view('admin.diploma.create', compact('diploma', 'evento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiplomaRequest $request): RedirectResponse
    {


        $validatedData = $request->validate([
            'fondo' => ['required','image','mimes:jpg,png,jpeg,','max:2048'],
            'descripcion' => ['required', 'string', 'max:255'],
           ]);
   
           $name = $request->file('fondo')->getClientOriginalName();
           $file = $request->file('fondo')->store('images', 'public');
   

        Diploma::create(
        [
            'evento_id'=>$request->evento_id,
            'fondo'=>$file,
            'descripcion'=>$request->descripcion,
            'parrafo_1'=>$request->parrafo_1,
            'parrafo_2'=>$request->parrafo_2        ]
        );

        return Redirect::route('diplomas.index')
            ->with('success', 'Operación realizada.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $diploma = Diploma::find($id);

        

        return view('admin.diploma.show', compact('diploma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $diploma = Diploma::find($id);
        $evento = Evento::all();

        return view('admin.diploma.edit', compact('diploma', 'evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiplomaRequest $request, Diploma $diploma): RedirectResponse
    {
        $diploma->update($request->validated());

        return Redirect::route('diplomas.index')
            ->with('success', 'Operación realizada');
    }

    public function destroy($id): RedirectResponse
    {
        Diploma::find($id)->delete();

        return Redirect::route('diplomas.index')
            ->with('success', 'Operación realizada');
    }

   
    public function CrearNomina($id)
    {
        $diploma = Diploma::find($id);
        $entradas = EntradasEvento::where('evento_id', $diploma->evento_id)->get();
        $diplomasUsuarios = DiplomasUsuario::where('evento_id', $diploma->evento_id)->get();

        if($entradas->count()>0)
        {
            foreach($entradas as $user)
            {
                $tieneRegistro=0;
                foreach($diplomasUsuarios as $du)
                {

                    if($du->user_id == $user->user_id)
                    {
                        $tieneRegistro=1;
                    }
                }
                
                if($tieneRegistro==0)
                {
                    DiplomasUsuario::create(
                    [
                        'evento_id'=>$user->evento_id, 
                        'user_id'=>$user->user_id, 
                        'diploma_id'=>$id, 
                        'nota'=>0, 
                        'asistencia'=>0,
                        'publicado'=>0,
                    ]
                    );
                }
            }

            $diploma->update(
                [
                    'es_borrable'=>1
                ]);

                return Redirect('ListarNomina/'.$diploma->id)
                ->with('success', 'Se actualiza nómina.');

                            
        }else{
            return Redirect::route('diplomas-usuarios.index', compact('diploma'))
            ->with('success', 'No se encontraron usuarios para generar nómina.');
        
        }
    }

}
