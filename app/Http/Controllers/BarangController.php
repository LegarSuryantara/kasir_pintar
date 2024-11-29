<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function barang(){   
        $barang = Barang::find(1);
        return $barang;
    }
    public function get_all(){
        $barang = Barang::with('kategori')->get();
        return $barang;
    }
}
