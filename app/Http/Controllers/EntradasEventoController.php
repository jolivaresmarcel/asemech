<?php

namespace App\Http\Controllers;

use App\Models\EntradasEvento;
use App\Models\Evento;
use App\Http\Controllers\App;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EntradasEventoRequest;
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

        return view('entradas-evento.index', compact('entradasEventos', 'evento'))
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

        return view('entradas-evento.create', compact('entradasEvento', 'evento', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntradasEventoRequest $request): RedirectResponse
    {
       
        EntradasEvento::create($request->validated());

        return Redirect::route('entradas-eventos.index')
            ->with('success', 'EntradasEvento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $entradasEvento = EntradasEvento::find($id);

        return view('entradas-evento.show', compact('entradasEvento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $entradasEvento = EntradasEvento::find($id);
        $evento = Evento::all();
        $user = User::all();


        return view('entradas-evento.edit', compact('entradasEvento','evento', 'user'));
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
        return view('entradas-evento.ValidaEntrada', compact('entradasEvento'));
        else
        return view('entradas-evento.EntradaNoValida');
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
            'fecha_compra'=>$entradasEvento->fecha_compra,
            'validada'=>1
        ]);

        return view('entradas-evento.ValidaEntrada', compact('entradasEvento'));
        
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

         $pdf = Pdf::loadView('entradas-evento.download',compact('entradasEvento'));
         return $pdf->stream('entrada.pdf');


         //return $entradasEvento;

        //return view('entradas-evento.download', compact('entradasEvento'));
    }
    
    public function generateCustomQRCode()
    {
        $image = QrCode::format('png')
                        ->size(300)
                        ->color(255, 0, 0)
                        ->backgroundColor(255, 255, 255)
                        ->margin(1)
     // ->merge('/public/path-to-logo.jpg', .3)
                        ->generate('Customize your QR code content here');
    
        return (['image' => $image]);
    }
    

}
