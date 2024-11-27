<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiskonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diskons')->insert([
            'nama_diskon' => 'promo bulan januari',
            'jumlah_barang' => 5,
            'presentase' => 10,
            'tanggal_mulai' => '2024-01-01',    
            'tanggal_akhir' => '2024-01-31',
            'toko_id' => 1,
        ]);
    }
}
