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
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(): view
    {
        $barangs = Barang::with(['kategori', 'toko'])->get();
        return view('barang.barang', compact('barangs'));
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
            'harga_jual' => 'required',
            'toko_id' => 'required|exists:tokos,id',
            'image_barang' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $barangs = Barang::findOrFail($id);
        
        // if ($request->hasFile('image_barang')) {
        //     $image = $request->file('image_barang');
        //     $filename = date("Y-m-d") . $image->getClientOriginalName();
        //     $path = "barang_images/" . $filename;
    
        //     Storage::disk('public')->put($path, file_get_contents($image));
            
        //     $barangs->image_barang = $filename;
        // }

        $image = $request->file('image_barang');
        $filename = date("Y-m-d").$image->getClientOriginalName();
        $path = "barang_images/".$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        $barangs->update([
            'nama_barang' => $request->nama_barang,
            'image_barang' => $filename,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id,
            'toko_id' => $request->toko_id,
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
            'harga_jual' => 'required',
            'toko_id' => 'required|exists:tokos,id',
            'image_barang' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = $request->file('image_barang');
        $filename = date("Y-m-d").$image->getClientOriginalName();
        $path = "barang_images/".$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'harga_jual' => $request->harga_jual,
            'toko_id' => $request->toko_id,
            'image_barang' => $filename,
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
