<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tokos')->insert([
            'nama_toko' => 'Selamet grosir',
            'no_hp' => '08769843568',
            'alamat' => 'Jonggol',
        ]);
    }
}
