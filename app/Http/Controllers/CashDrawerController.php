<?php

namespace App\Http\Controllers;

use App\Models\CashDrawer;
use App\Models\Toko;
use App\Models\kasir;
use App\Models\Shift;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CashDrawerController extends Controller
{
    public function index(): view
    {
        $cashdrawers = CashDrawer::with(['toko', 'kasir', 'shift'])->get();
        return view('cashdrawer.cashdrawer', compact('cashdrawers'));
    }

    public function create()
    {
        $cashdrawers = CashDrawer::all();
        $tokos = Toko::all();
        $kasirs = Kasir::all();
        $shifts = Shift::all();
        return view('cashdrawer.tambah', compact('cashdrawers', 'tokos', 'kasirs', 'shifts'));
    }

    public function edit($id) :View {
        $cashdrawers = CashDrawer::findOrFail($id);
        $tokos = Toko::all();
        $kasirs = Kasir::all();
        $shifts = Shift::all();
        return view('cashdrawer/ubah', compact('cashdrawers', 'tokos', 'kasirs', 'shifts'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'toko_id' => 'required|exists:tokos,id',
            'kasir_id' => 'required|exists:kasirs,id',
            'shift_id' => 'required|exists:shifts,id',
            'uang_sebelum' => 'required',
            'uang_sesudah' => 'required',
        ]);

        $cashdrawers = CashDrawer::findOrFail($id);
        $cashdrawers->update([
            'toko_id' => $request->toko_id,
            'kasir_id' => $request->kasir_id,
            'shift_id' => $request->shift_id,
            'uang_sebelum' => $request->uang_sebelum,
            'uang_sesudah' => $request->uang_sesudah
        ]);

        return redirect()->route('cashdrawer.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $cashdrawers = CashDrawer::findOrFail($id);
        $cashdrawers->delete();
        return redirect()->route('cashdrawer.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'toko_id' => 'required',
            'kasir_id' => 'required',
            'shift_id' => 'required',
            'uang_sebelum' => 'required',
            'uang_sesudah' => 'required'
        ]);

        CashDrawer::create([
            'toko_id' => $request->toko_id,
            'kasir_id' => $request->kasir_id,
            'shift_id' => $request->shift_id,
            'uang_sebelum' => $request->uang_sebelum,
            'uang_sesudah' => $request->uang_sesudah
        ]);

        return redirect()->route('cashdrawer.index');
    }
}