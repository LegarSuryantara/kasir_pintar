<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Toko;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\KategoriResource;

class KategoriController extends Controller
{

    public function index(): View
    {
        $kategoris = Kategori::with(['toko'])->get();
        return view('kategori.kategori', compact('kategoris'));
        return KategoriResource::collection(Kategori::get());
    }

    public function create()
    {
        $tokos = Toko::all();
        return view('kategori.tambah', compact('tokos'));
    }

    public function edit($id) :View {
        $kategori = Kategori::findOrFail($id);
        $tokos = Toko::all();
        return view('kategori/ubah', compact('kategori', 'tokos'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        $kategoris = Kategori::findOrFail($id);
        $kategoris->update([
            'kategori' => $request->kategori,
            'toko_id' => $request->toko_id
        ]);

        return redirect()->route('kategori.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with(['success' => 'berhasil']);
    }


    public function store(Request $request) : RedirectResponse
    {
        // Validasi input
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
