<?php

namespace App\Http\Controllers;

use App\Models\EntradasEvento;
use App\Models\Evento;
use App\Http\Controllers\App;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EntradasEventoRequest;
use App\Models\TiposEntrada;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EntradasEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $entradasEventos = EntradasEvento::paginate();
        $evento = Evento::all();
        $tipo_entrada = TiposEntrada::all();

        return view('admin.entradas-evento.index', compact('entradasEventos', 'evento', 'tipo_entrada'))
            ->with('i', ($request->input('page', 1) - 1) * $entradasEventos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $entradasEvento = new EntradasEvento();
        $evento = Evento::all();
        $user = User::all();
        $tipo_entrada = TiposEntrada::all();

        return view('admin.entradas-evento.create', compact('entradasEvento', 'evento', 'user', 'tipo_entrada'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntradasEventoRequest $request): RedirectResponse
    {
       
         EntradasEvento::create($request->validated());

         $eventos=Evento::find($request->evento_id);

         $disponible =$eventos->cupos_disponibles-1;

         $eventos->update(['cupos_disponibles' =>$disponible]);

         return Redirect::route('entradas-eventos.index')
             ->with('success', 'EntradasEvento created successfully.');


        
    }

    // public function store(EntradasEventoRequest $request)
    // { 
    //     return  ($request);

    // }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $entradasEvento = EntradasEvento::find($id);

        return view('admin.entradas-evento.show', compact('entradasEvento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $entradasEvento = EntradasEvento::find($id);
        $evento = Evento::all();
        $user = User::all();


        return view('admin.entradas-evento.edit', compact('entradasEvento','evento', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntradasEventoRequest $request, EntradasEvento $entradasEvento): RedirectResponse
    {
        $entradasEvento->update($request->validated());

        return Redirect::route('entradas-eventos.index')
            ->with('success', 'EntradasEvento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EntradasEvento::find($id)->delete();

        return Redirect::route('entradas-eventos.index')
            ->with('success', 'EntradasEvento deleted successfully');
    }

    public function ValidaEntrada($id):view
    {
         //$entradasEvento = EntradasEvento::find($id);

        if($entradasEvento = EntradasEvento::find($id))
        return view('admin.entradas-evento.ValidaEntrada', compact('entradasEvento'));
        else
        return view('admin.entradas-evento.EntradaNoValida');
        //return ($entradasEvento);
    }

    public function RegistraAsistencia($id):View
    {
        $entradasEvento=EntradasEvento::find($id);
        $entradasEvento->validada=0;
        $entradasEvento->update([
            'id'=>$entradasEvento->id,
            'evento_id'=>$entradasEvento->evento_id, 
            'user_id'=>$entradasEvento->user_id, 
            'tipo_entrada_id'=>$entradasEvento->tipo_emtrada_id,
            
        ]);

        return view('admin.entradas-evento.ValidaEntrada', compact('entradasEvento'));
        
         //$entradasEvento = EntradasEvento::find($id);

        // if($entradasEvento = EntradasEvento::find($id))
        // return view('entradas-evento.ValidaEntrada', compact('entradasEvento'));
        // else
        // return view('entradas-evento.EntradaNoValida');
        //return ($entradasEvento);
    }

    public function download($id)
    {
        // //$path = getenv('IMAGE_URL')."/img/logo.png";
        // $png = QrCode::format('png')->merge( .17, true)->size(300)->errorCorrection('H')->generate("dddd");
        // $png = base64_encode($png);
     
         $entradasEvento = EntradasEvento::find($id);

         $pdf = Pdf::loadView('admin.entradas-evento.download',compact('entradasEvento'));
         return $pdf->stream('entrada.pdf');


         //return $entradasEvento;

        //return view('entradas-evento.download', compact('entradasEvento'));
    }
    
  

}
