<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Kategori;
use App\Models\Toko;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalBarang' => Barang::count(),
            'totalKategori' => Kategori::count(),
            'totalCustomer' => Customer::count(),
            'totalToko' => Toko::count(),
            'barangTerbaru' => Barang::with('kategori')->latest()->take(5)->get(),
            'customerTerbaru' => Customer::latest()->take(5)->get(),
        ];

        return view('dashboard', $data);
    }
}
