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
        Schema::create('kasirs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_toko');
            $table->string('nama_kasir');
            $table->string('no_hp', 12);
            $table->string('alamat');
            $table->timestamps();

            $table->foreign('id_toko')->references('id')->on('tokos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kasirs');
    }
};
