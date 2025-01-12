<?php

namespace App\Http\Controllers;

use App\Models\CashDrawer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CashDrawerController extends Controller
{
    public function index(): view
    {
        $cashdrawers = CashDrawer::get();
        return view('cashdrawer.cashdrawer', compact('cashdrawers'));
    }

    public function create()
    {
        $cashdrawers = CashDrawer::all();
        return view('cashdrawer.tambah', compact('cashdrawers'));
    }

    public function edit($id) :View {
        $cashdrawers = CashDrawer::findOrFail($id);
        return view('cashdrawer/ubah', compact('cashdrawers'));
    }

    public function update(Request $request, $id) :RedirectResponse
    {
        $request->validate([
            'toko_id' => 'required|exists:tokos,id',
            'kasir_id' => 'required|exists:kasirs,id',
            'shifts_id' => 'required|exists:shifts,id',
            'pemasukan' => 'required',
            'pengeluaran' => 'required',
        ]);

        $cashdrawers = CashDrawer::findOrFail($id);
        $cashdrawers->update([
            'toko_id' => $request->toko_id,
            'kasir_id' => $request->kasir_id,
            'shifts_id' => $request->shifts_id,
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran
        ]);

        return redirect()->route('cashdrawer.index')->with(['success' => 'berhasil']);
        
    }

    public function delete($id){
        
        $cashdrawers = CashDrawer::findOrFail($id);
        $cashdrawers->delete();
        return redirect()->route('cashdrawer.index')->with(['success' => 'berhasil']);
    }

    public function store(Request $request) : RedirectResponse
    {
        // Validasi input
        $request->validate([
            'toko_id' => 'required|exists:tokos,id',
            'kasir_id' => 'required|exists:kasirs,id',
            'shifts_id' => 'required|exists:shifts,id',
            'pemasukan' => 'required',
            'pengeluaran' => 'required',
        ]);

        CashDrawer::create([
            'toko_id' => $request->toko_id,
            'kasir_id' => $request->kasir_id,
            'shifts_id' => $request->shifts_id,
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran
        ]);

        return redirect()->route('cashdrawer.index')->with(['success' => 'berhasil']);
    }
}