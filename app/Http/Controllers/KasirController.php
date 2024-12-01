<?php

namespace App\Http\Controllers;
use App\Models\Toko;
use App\Models\kasir;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KasirController extends Controller
{
    public function index(): view
    {
        $kasirs = Kasir::with(['toko'])->get();
        return view('kasir.kasir', compact('kasirs'));
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
        $request->validate([
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

        return redirect()->route('kasir.index')->with(['success' => 'berhasil']);
    }

    public function kasir()
    {
        $kasir = Kasir::find(1);
        return $kasir->toko->nama_toko;
    }

    public function get_all(){
        $kasir = kasir::with('toko')->get();
        return $kasir;
    }
    //
}
