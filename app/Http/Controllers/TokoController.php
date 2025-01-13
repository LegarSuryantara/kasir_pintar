<?php

namespace App\Http\Controllers;

use App\Http\Resources\TokoResource;
use App\Models\Toko;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{

    

    public function index()
    {
        $tokos = Toko::get();
        return view('toko.toko', compact('tokos'));

        // json
        // return TokoResource::collection(Toko::get());
    }

    public function create()
    {
        $tokos = toko::all();
        return view('toko.tambah', compact('tokos'));
    }

    public function edit($id) :View {
        $tokos = Toko::findOrFail($id);
        return view('toko/ubah', compact('tokos'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'image_toko' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $tokos = Toko::findOrFail($id);
        
        if ($request->hasFile('image_toko')) {
            $image = $request->file('image_toko');
            $filename = date("Y-m-d") . $image->getClientOriginalName();
            $path = "toko_images/" . $filename;
    
            Storage::disk('public')->put($path, file_get_contents($image));
            
            $tokos->image_toko = $filename;
        }

        $tokos->update([
            'nama_toko' => $request->nama_toko,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('toko.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $toko = Toko::findOrFail($id);
        $toko->delete();
        return redirect()->route('toko.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'image_toko' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = $request->file('image_toko');
        $filename = date("Y-m-d").$image->getClientOriginalName();
        $path = "toko_images/".$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        Toko::create([
            'nama_toko' => $request->nama_toko,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'image_toko' => $filename,
        ]);

        // json
        // $toko = Toko::create($validatedData);
        // return new TokoResource($toko);

        return redirect()->route('toko.index')->with(['success' => 'berhasil']);
    }
    // public function kasir()
    // {
    //     $kasirs = Toko::find(1)->kasirs;
    //     foreach ($kasirs as $kasir) {
    //         echo $kasir;
    //     }
    // }

// public function index(){
//     $kategoris = Toko::find(1)->kategoris;
     
//     foreach ($kategoris as $kategori) {
//         echo $kategori;
//     }
// }
   

}
