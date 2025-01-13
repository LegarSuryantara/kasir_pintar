<?php

namespace App\Http\Controllers;

use App\Http\Resources\KasirResource;
use App\Models\Toko;
use App\Models\kasir;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KasirController extends Controller
{
    public function index()
    {
        $kasirs = Kasir::with(['toko'])->get();
        return view('kasir.kasir', compact('kasirs'));

        //json
        // return KasirResource::collection(Kasir::get());
    }

    public function create()
    {
        $tokos = Toko::all();
        return view('kasir.tambah', compact('tokos'));
    }

    public function edit($id) :View {
        $kasir = Kasir::findOrFail($id);
        $tokos = Toko::all();
        return view('kasir/ubah', compact('kasir', 'tokos'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'nama_kasir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        $kasirs = Kasir::findOrFail($id);
        $kasirs->update([
            'nama_kasir' => $request->nama_kasir,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'toko_id' => $request->toko_id
        ]);

        return redirect()->route('kasir.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $kasir = Kasir::findOrFail($id);
        $kasir->delete();
        return redirect()->route('kasir.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request) : RedirectResponse
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_kasir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        Kasir::create([
            'nama_kasir' => $request->nama_kasir,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'toko_id' => $request->toko_id
        ]);


        //json
        // $kasir = Kasir::create($validatedData);
        // return new KasirResource($kasir);



        return redirect()->route('kasir.index')->with(['success' => 'berhasil']);
    }


    #API
    public function indexAPI()
    {
        Kasir::with(['toko'])->get();
        return KasirResource::collection(Kasir::get());
    }

    public function getSingleData($id)
    {
        $Kasir = Kasir::with(['toko'])->findOrFail($id);
    
        $data = [
            'Kasir' => new KasirResource($Kasir)
        ];
    
        return $data; 
    }

    
    public function storeAPI(Request $request) 
    {
        
        $validatedData = $request->validate([
            'nama_kasir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'toko_id' => 'required|exists:tokos,id',
        ]);
        $Kasir = Kasir::create($validatedData);
        return new KasirResource($Kasir);
    }

    public function updateAPI(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kasir' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'toko_id' => 'required|exists:tokos,id',
        ]);
    
        $Kasir = Kasir::findOrFail($id);
        $Kasir->update($validatedData);
        return new KasirResource($Kasir);
    }

    
    public function deleteAPI($id){
        $Kasir = Kasir::findOrFail($id);
        $Kasir->delete();
        return (['success' => 'berhasil']);
    }
    //
}
