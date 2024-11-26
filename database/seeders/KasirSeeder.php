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
            'id_toko' => 1,
            'nama_kasir' => 'Ucup Sumbul',
            'no_hp' => '08976533689',
            'alamat' => 'Pati',
        ]);
    }
}