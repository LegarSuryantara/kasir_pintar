<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengadaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengadaans')->insert([
            'tanggal_pengadaan' => '2024-01-02',
            'toko_id' => 1,
            'supplier_id' => 1,
        ]);
    }
}
