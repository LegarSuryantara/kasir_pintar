<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Models\Barang;
use App\Models\Diskon;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    public function index(): view
    {
        $barangs = Barang::with(['kategori'])->get();
        return view('barang.barang', compact('barangs'));
        return BarangResource::collection(Barang::get());
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.tambah', compact('kategoris'));
    }

    public function edit($id) :View {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('barang/ubah', compact('barang', 'kategoris'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $barangs = Barang::findOrFail($id);
        $barangs->update([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id
        ]);

        return redirect()->route('barang.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request) 
    {
        
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id
        ]);

        $barang = Barang::create($validatedData);
        // return redirect()->route('barang.index')->with(['success' => 'berhasil']);
        return new BarangResource($barang);
    }

    public function barang(){   
        $barang = Barang::find(1);
        return $barang;
    }
    public function get_all(){
        $barang = Barang::with('kategori')->get();
        return $barang;
    }

}
