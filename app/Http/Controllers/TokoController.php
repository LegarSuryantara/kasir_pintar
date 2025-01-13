<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Resources\TokoResource;
use Illuminate\Http\RedirectResponse;

class TokoController extends Controller
{

    

    public function index()
    {
        $tokos = Toko::get();
        $users = User::get();
        return view('toko.toko', compact('tokos','users'));

        // json
        // return TokoResource::collection(Toko::get());
    }

    public function create()
    {
        $tokos = toko::all();
        $users = user::all();
        return view('toko.tambah', compact('tokos', 'users'));
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
        ]);

        $tokos = Toko::findOrFail($id);
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
        ]);

        Toko::create([
            'nama_toko' => $request->nama_toko,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
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
