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
        Schema::create('cash_drawers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('toko_id')->constrained();
            $table->foreignId('kasir_id')->constrained();
            $table->foreignId('shift_id')->constrained();
            $table->integer('uang_sebelum');
            $table->integer('uang_sesudah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_drawers');
    }
};
