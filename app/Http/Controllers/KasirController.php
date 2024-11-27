<?php

namespace App\Http\Controllers;
use App\Models\kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function kasir()
    {
        $kasir = Kasir::find(1);
        return $kasir->toko->nama_toko;
    }

    public function get_all(){
        $kasir = kasir::with('toko')->get();
        return $kasir;
    }
    //
}
