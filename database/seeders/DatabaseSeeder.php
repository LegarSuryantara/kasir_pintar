<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            SupplierSeeder::class,
            TokoSeeder::class,
            KategoriSeeder::class,
            KasirSeeder::class,
            PajakSeeder::class,
            DiskonSeeder::class,
            BarangSeeder::class,
            PengadaanSeeder::class,
            DetailPengadaanSeeder::class,
            StokSeeder::class,
            ShiftSeeder::class,
            CashDrawerSeeder::class,
            // UserSeeder::class
        ]);
    }
}
