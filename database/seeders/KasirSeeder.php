<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kasirs')->insert([
            'nama_kasir' => 'Ucup Sumbul',
            'no_hp' => '08976533689',
            'alamat' => 'Pati',
            'toko_id' => 1,
        ]);
    }
}
