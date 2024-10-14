<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TiposEntrada;
class TipoEntradasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiposEntrada::create(['descripcion'=>'General']);
        TiposEntrada::create(['descripcion'=>'Cortesía']);
    }
}
