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
        Schema::create('diplomas', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnUpdate();  
            $table->binary('fondo')->nullable();
            $table->longText('descripcion');
            $table->longText('parrafo_1')->nullable();;
            $table->longText('parrafo_2')->nullable();                   
            $table->integer('es_borrable')->default(0);      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
