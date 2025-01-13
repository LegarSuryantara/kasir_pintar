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
            'image_toko' => 'Gambar Toko',
            'no_hp' => '087698435686',
            'alamat' => 'Jonggol',
            'user_id' => 1,
        ]);
    }
}
