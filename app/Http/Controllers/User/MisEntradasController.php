<?php

namespace App\Http\Controllers\User;

use App\Models\EntradasEvento;
use App\Models\Evento;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\App;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EntradasEventoRequest;
use App\Models\Certificado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class MisEntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //$entradasEventos = EntradasEvento::paginate();
        $user=Auth::user();        
        // $certificado = Certificado::where('user_id', $user->id)->where('es_valido', 1)->get();
        // $UsuarioHabilitado=0;
       
        // foreach($certificado as $c)
        // {
        //     if($c->fecha_caducidad>=now())
        //     {
        //         $UsuarioHabilitado=1;
        //     }
        // }


        // if($UsuarioHabilitado==1){

        $entradasEventos = EntradasEvento::where('user_id', $user->id)->paginate();
        
        return view('Users.MisEntradas.index', compact('entradasEventos'))
            ->with('i', ($request->input('page', 1) - 1) * $entradasEventos->perPage());
        // }else{
        //     return('Falta ingresar certificado de alumno regular');
        // }
    }


    public function DownloadEntrada($id)
    {
        // //$path = getenv('IMAGE_URL')."/img/logo.png";
        // $png = QrCode::format('png')->merge( .17, true)->size(300)->errorCorrection('H')->generate("dddd");
        // $png = base64_encode($png);
     
        //  $entradasEvento = EntradasEvento::find($id);

        //  $pdf = Pdf::loadView('MisEntradas.DownloadEntrada',compact('entradasEvento'));
        //  return $pdf->stream('entrada.pdf');


         return $id;

        //return view('entradas-evento.download', compact('entradasEvento'));
    }
    
   

}