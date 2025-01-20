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
        Schema::create('transaksi_penjualans', function (Blueprint $table) {
            $table->id();
            $table->foreignID('toko_id');
            $table->foreignID('kasir_id');
            $table->foreignID('diskon_id');
            $table->foreignID('pajak_id');
            $table->integer('subtotal');
            $table->integer('total_penjualan');
            $table->integer('jumlah_barang');
            $table->date('tanggal_penjualan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penjualans');
    }
};
