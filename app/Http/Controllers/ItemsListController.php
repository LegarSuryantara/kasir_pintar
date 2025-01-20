<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class ItemsListController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        return view('addItems', compact('barangs'));
    }
}
