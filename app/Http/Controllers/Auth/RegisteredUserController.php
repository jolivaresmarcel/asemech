<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
          $request->validate([
              'nombre' => ['required', 'string', 'max:50'],
              'paterno' => ['required', 'string', 'max:50'],
              'materno' => ['required', 'string', 'max:50'],
              'rut' => ['required', 'string', 'max:10', 'unique:'.User::class], 
              'telefono' => ['required', 'integer', 'max:9'],
              'universidad' => ['required', 'string', 'max:100'],
              'anio' => ['required', 'integer', 'max:2'],
              'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
              'password' => ['required', 'confirmed', Rules\Password::defaults()],
           ]);

        $user = User::create([
            'name' => $request->nombre . '  ' . $request->paterno,
            'nombre' => $request->nombre,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'rut' => $request->rut,
            'telefono' => $request->telefono,
            'universidad' => $request->universidad,
            'anio' => $request->anio,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole('User');

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
