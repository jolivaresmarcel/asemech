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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('payment_id');
            $table->foreignId('evento_id')->constrained('eventos')->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->foreignId('compra_id')->constrained('compras')->cascadeOnUpdate();
            $table->string('status');
            $table->string('status_detail');
            $table->json('create_payment')->nullable();
            $table->json('get_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};