<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Toko;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KategoriController extends Controller
{
    public function index(): view
    {
        $kategoris = Kategori::with(['toko'])->get();
        return view('kategori.kategori', compact('kategoris'));
    }
    
    public function create()
    {
        $tokos = Toko::all();
        return view('kategori.tambah', compact('tokos'));
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        Kategori::create([
            'kategori' => $request->kategori,
            'toko_id' => $request->toko_id
        ]);

        return redirect()->route('kategori.index')->with(['success' => 'berhasil']);
    }
    public function kategori(){
        $kategori = kategori::find(1);
        return $kategori->toko->nama_toko;  
    }

    public function get_all(){
        $kategori = Kategori::with('toko')->get();
        return $kategori;
    }
}
