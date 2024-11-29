<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function stok(){
        $stok = Stok::find(1);
        return $stok->toko->nama_toko;  
    }

    public function get_all(){
        $Stok = Stok::with('barang')->get();
        return $Stok;
    }
}
