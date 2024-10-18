<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Auth;

class MisDiplomasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $user=Auth::user(); 
        $diplomasUsuarios = DiplomasUsuario::where('user_id', $user->id)->paginate();

        return view('users.misdiplomas.index', compact('diplomasUsuarios'))
            ->with('i', ($request->input('page', 1) - 1) * $diplomasUsuarios->perPage());
    }

  
  
}
