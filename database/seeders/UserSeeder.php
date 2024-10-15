<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Administrador Sistema',
            'nombre' => 'Administrador',
            'paterno' => 'Asemech',
            'materno' => 'Sistema',
            'rut' => '11111111-1',
            'telefono' => '5698765',
            'universidad' => 'Universidad X',
            'anio' => '7',
            'email' => 'admin@asemech.cl',
            'password' => Hash::make('admin1234'),
            'email_verified_at' => now()
        ])->assignRole('Admin');
    }
}
