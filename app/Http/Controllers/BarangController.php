<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangResource;
use App\Models\Barang;
use App\Models\Toko;
use App\Models\Diskon;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    public function index(): view
    {
        $barangs = Barang::with(['kategori', 'toko'])->get();
        return view('barang.barang', compact('barangs'));
        // json
        // return BarangResource::collection(Barang::get());
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $tokos = Toko::all();
        return view('barang.tambah', compact('kategoris', 'tokos'));
    }

    public function edit($id) :View {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        $tokos = Toko::all();
        return view('barang/ubah', compact('barang', 'kategoris', 'tokos'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        $barangs = Barang::findOrFail($id);
        $barangs->update([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'toko_id' => $request->toko_id
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
        
       $validatedData= $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'toko_id' => $request->toko_id
        ]);

        //json
        // $barang = Barang::create($validatedData);
        // return new BarangResource($barang);

        return redirect()->route('barang.index')->with(['success' => 'berhasil']);
        
    }



    #API

    public function indexAPI()
    {
        Barang::with(['kategori', 'toko'])->get();
        return BarangResource::collection(Barang::get());
    }
    public function getSingleData($id)
    {
        $barang = Barang::with(['kategori', 'toko'])->findOrFail($id);
    
        $data = [
            'barang' => new BarangResource($barang)
        ];
    
        return $data; 
    }

    
    public function storeAPI(Request $request) 
    {
        
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'toko_id' => 'required|exists:tokos,id',
        ]);
        $barang = Barang::create($validatedData);
        return new BarangResource($barang);
    }

    public function updateAPI(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'toko_id' => 'required|exists:tokos,id',
        ]);
    
        $barang = Barang::findOrFail($id);
        $barang->update($validatedData);
        return new BarangResource($barang);
    }

    
    public function deleteAPI($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return (['success' => 'berhasil']);
    }


    
}
