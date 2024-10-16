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
        Schema::create('diplomas_usuarios', function (Blueprint $table) {
            $table->uuid('id')->primary();                   
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->foreignId('diploma_id')->constrained('diplomas')->cascadeOnUpdate();
            $table->float('nota');
            $table->float('asistencia');
            $table->integer('publicado');
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
