<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CertificadoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MisCertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        $user=Auth::user(); 

        $certificados = Certificado::where('user_id', $user->id)->paginate();
        $error="";

        return view('users.miscertificado.index', compact('certificados','error'))
            ->with('i', ($request->input('page', 1) - 1) * $certificados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $certificado = new Certificado();
        $user=Auth::user();   

        return view('users.miscertificado.create', compact('certificado', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificadoRequest $request): RedirectResponse
    {

        $validatedData = $request->validate([
         'archivo' => 'required|image|mimes:jpg,png,jpeg,gif,svg,pdf|max:2048',
        ]);

        $name = $request->file('archivo')->getClientOriginalName();
        $file = $request->file('archivo')->store('images', ['disk' => 'public']);


        $request->validate([
            'user_id' => ['required', 'integer'],
            'es_valido' => ['required', 'integer'],
            'fecha_caducidad' => ['required', 'date'],
         ]);

        Certificado::create([
            'user_id'=> $request->user_id, 
            'es_valido'=> $request-> es_valido, 
            'fecha_caducidad' => $request->fecha_caducidad, 
            'archivo'=>$file]);
       
        return Redirect::route('miscertificados.index')
            ->with('success', 'Operación realizada');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $certificado = Certificado::find($id);

        return view('users.miscertificado.show', compact('certificado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $certificado = Certificado::find($id);
        $user = User::all();

        return view('users.miscertificado.edit', compact('certificado','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificadoRequest $request, Certificado $certificado)
    {

        if($request->archivo == null)
        {
            $request->validate([
                'user_id' => ['required', 'integer'],
                'es_valido' => ['required', 'integer'],
                'fecha_caducidad' => ['required', 'date'],
            ]);

            $certificado->update([
                'user_id'=> $request->user_id, 
                'es_valido'=> $request-> es_valido, 
                'fecha_caducidad' => $request->fecha_caducidad
            ]);
        }else{

             
          $validatedData = $request->validate([
            'archivo' => 'image|mimes:jpg,png,jpeg,gif,svg,pdf|max:2048',
           ]);
   
           $name = $request->file('archivo')->getClientOriginalName();
           $file = $request->file('archivo')->store('images', ['disk' => 'public']);

           
           $request->validate([
            'user_id' => ['required', 'integer'],
            'es_valido' => ['required', 'integer'],
            'fecha_caducidad' => ['required', 'date'],
            ]);

            $certificado->update([
                'user_id'=> $request->user_id, 
                'es_valido'=> $request-> es_valido, 
                'fecha_caducidad' => $request->fecha_caducidad,
                'archivo'=>$file
            ]);

        }

       
   


        return Redirect::route('miscertificados.index')
            ->with('success', 'Operación realizada');

       
    }

    public function destroy($id): RedirectResponse
    {
        Certificado::find($id)->delete();

        return Redirect::route('miscertificados.index')
            ->with('success', 'Operación realizada');
    }
}
