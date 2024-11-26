<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $toko = kategori::find(1);
        return $toko->kategori;
         
        
    }
}
