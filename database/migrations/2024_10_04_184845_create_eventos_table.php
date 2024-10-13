<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->longText('descripcion');
            $table->longText('terminos');
            $table->binary('foto');
            $table->date('inicio');
            $table->date('termino');
            $table->integer('cupos');
            $table->integer('cupos_disponibles');         
            $table->date('publicacion');
            $table->string('lugar');
            $table->float('valor');
            $table->timestamps();
        });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
