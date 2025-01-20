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

            $table->foreignId('toko_id')->constrained();
            $table->foreignId('kasir_id')->constrained();
            $table->foreignId('pajak_id')->constrained();
            $table->foreignId('diskon_id')->constrained();
            $table->decimal('subtotal', 10, 2);
            $table->decimal('total_harga', 10, 2);
            $table->integer('jumlah_barang');
            $table->string('metode_pembayaran');
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
