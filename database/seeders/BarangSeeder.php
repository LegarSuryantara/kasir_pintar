<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            'nama_barang' => 'mie goreng',
            'image_barang' => 'mie_goreng.jpg',
            'harga_jual' => 20000,
            'kategori_id' => 1,
            'toko_id' => 1,
        ]);
    }
}
