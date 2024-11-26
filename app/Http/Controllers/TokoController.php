<?php

namespace App\Http\Controllers;
use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
public function index(){
    $kategoris = Toko::find(1)->kategoris;
     
    foreach ($kategoris as $kategori) {
        echo $kategori;
    }
}
   
}
