<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi_penjualans')->insert([
            'toko_id' => 1,
            'kasir_id' => 1,
            'diskon_id' => 1,
            'pajak_id' => 1,
            'subtotal' => 100000,
            'total_penjualan' => 90000,
            'jumlah_barang' => 10,
            'tanggal_penjualan' => '2022-01-01',
        ]);
    }
}
