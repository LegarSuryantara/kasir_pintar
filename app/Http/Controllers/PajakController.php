<?php

namespace App\Http\Controllers;
use App\Models\Pajak;
use Illuminate\Http\Request;

class PajakController extends Controller
{
    public function pajak(){
        $pajak = pajak::find(1);
        return $pajak->toko->nama_toko;  
    }

    public function get_all(){
        $pajak = pajak::with('toko')->get();
        return $pajak;
    }
}
