<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shifts')->insert([
            'kasir_id' => 1,
            'toko_id' => 1,
            'waktu_masuk' => '06:00:00',
            'waktu_keluar' => '18:00:00',
        ]);
    }
}
