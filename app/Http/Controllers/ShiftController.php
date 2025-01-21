<?php

namespace App\Http\Controllers;


use App\Models\Toko;
use App\Models\Kasir;
use App\Models\Shift;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::with(['toko', 'kasir'])->get();
        return view('shift.shift', compact('shifts'));

      
    }

    public function create()
    {
        $tokos = Toko::all();
        $kasirs = Kasir::all();
        return view('shift.tambah', compact('tokos','kasirs' ));
    }

    public function edit($id) :View {
        $shift = Shift::findOrFail($id);
        $tokos = Toko::all();
        $kasirs = Kasir::all();
        return view('shift/ubah', compact('shift', 'tokos', 'kasirs'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'kasir_id' => 'required|exists:kasirs,id',
            'toko_id' => 'required|exists:tokos,id',
            'waktu_masuk' => 'required',
            'waktu_keluar' => 'required',
        ]);

        $shifts = Shift::findOrFail($id);
        $shifts->update([
            'kasir_id' => $request->kasir_id,
            'toko_id' => $request->toko_id,
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
            
        ]);

        return redirect()->route('shift.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $shift = Shift::findOrFail($id);
        $shift->delete();
        return redirect()->route('shift.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request) : RedirectResponse
    {
        // Validasi input
        $request->validate([
            'kasir_id' => 'required|exists:kasirs,id',
            'toko_id' => 'required|exists:tokos,id',
            'waktu_masuk' => 'required',
            'waktu_keluar' => 'required',
        ]);

        Shift::create([
            'kasir_id' => $request->kasir_id,
            'toko_id' => $request->toko_id,
            'tanggal' => now(),
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
        ]);


        //json
        // $kasir = Kasir::create($validatedData);
        // return new KasirResource($kasir);



        return redirect()->route('shift.index')->with(['success' => 'berhasil']);
    }
}
