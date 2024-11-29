<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stoks')->insert([
            'jumlah_stok' => 120,
            'toko_id' => 1,
            'barang_id' => 1,
        ]);
        
    }
}
