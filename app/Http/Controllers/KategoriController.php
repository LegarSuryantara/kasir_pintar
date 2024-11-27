<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategori(){
        $kategori = kategori::find(1);
        return $kategori->toko->nama_toko;  
    }

    public function get_all(){
        $kategori = Kategori::with('toko')->get();
        return $kategori;
    }
}
