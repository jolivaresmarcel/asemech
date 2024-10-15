<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TiposCompra;
class TiposComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TiposCompra::create(['descripcion'=>'Pago por Khipu']);
        TiposCompra::create(['descripcion'=>'Transferencia']);
    }
}
