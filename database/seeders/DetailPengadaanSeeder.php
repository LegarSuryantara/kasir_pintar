<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPengadaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_pengadaans')->insert([
            'harga_dasar' => 1000,
            'harga_jual' => 1500,
            'stok' => 2,
            'pengadaan_id' => 1,
            'barang_id' => 1,
        ]);
    }
}
