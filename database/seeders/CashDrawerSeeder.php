<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CashDrawerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cash_drawers')->insert([
            'toko_id' => 1,
            'kasir_id' => 1,
            'shift_id' => 1,
            'uang_sebelum' => 1000000,
            'uang_sesudah' => 2000000,
        ]);
    }
}
