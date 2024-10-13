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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();                                
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnUpdate();           
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->integer('estado_id');
            $table->integer('tipo');
            $table->binary('archivo')->nullable();
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
