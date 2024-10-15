<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    use HasUuids;

    public function up(): void
    {
        Schema::dropIfExists('entradas_eventos');
        Schema::create('entradas_eventos', function (Blueprint $table) {
            $table->uuid('id')->primary();                 
            $table->foreignId('tipo_entrada_id')->constrained('tipos_entradas')->cascadeOnUpdate();
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();         
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