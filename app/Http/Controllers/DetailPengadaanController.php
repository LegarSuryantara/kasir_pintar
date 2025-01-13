<?php

namespace App\Http\Controllers;

use App\Models\DetailPengadaan;
use Illuminate\Http\Request;

class DetailPengadaanController extends Controller
{
    public function detailPengadaan(){
        $detailpengadaan = DetailPengadaan::find(1);
        return $detailpengadaan->pengadaan->tanggal_pengadaan;  
    }
    public function get_all(){
        $detailpengadaan = DetailPengadaan::with('pengadaan')->get();
        return $detailpengadaan;
    }
}
