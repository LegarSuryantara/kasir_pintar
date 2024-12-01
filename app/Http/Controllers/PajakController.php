<?php

namespace App\Http\Controllers;
use App\Models\Pajak;
use App\Models\Toko;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PajakController extends Controller
{

    public function index(): view
    {
        $pajaks = Pajak::with(['toko'])->get();
        return view('pajak.pajak', compact('pajaks'));
    }

    public function store(Request $request) : RedirectResponse
    {
        // Validasi input
        $request->validate([
            'presentase' => 'required',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        Pajak::create([
            'presentase' => $request->presentase,
            'toko_id' => $request->toko_id
        ]);

        return redirect()->route('pajak.index')->with(['success' => 'berhasil']);
    }

    public function pajak(){
        $pajak = Pajak::find(1);
        return $pajak->toko->nama_toko;  
    }

    public function get_all(){
        $pajak = Pajak::with('toko')->get();
        return $pajak;
    }

    public function create()
    {
        $tokos = Toko::all();
        return view('pajak.tambah', compact('tokos'));
    }

    public function edit($id) :View {
        $pajak = Pajak::findOrFail($id);
        $tokos = Toko::all();
        return view('pajak/ubah', compact('pajak', 'tokos'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'presentase' => 'required',
            'toko_id' => 'required|exists:tokos,id',
        ]);

        $pajaks = Pajak::findOrFail($id);
        $pajaks->update([
            'presentase' => $request->presentase,
            'toko_id' => $request->toko_id
        ]);

        return redirect()->route('pajak.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $pajak = Pajak::findOrFail($id);
        $pajak->delete();
        return redirect()->route('pajak.index')->with(['success' => 'berhasil']);
    }
}
