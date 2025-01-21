<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Shift; // Pastikan Anda memiliki model Shift
use Carbon\Carbon;

class ShiftKasirController extends Controller
{
    public function showShiftForm()
    {

        $shifts = Shift::all();

        return view('shift', [
            'shifts' => $shifts,
        ]);
    }

    public function startShift(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|string',
            'toko_id' => 'required|integer',
            'kasir_id' => 'required|integer',
        ]);

        // Konversi waktu ke format HH:mm:ss jika diperlukan
        $formattedTime = Carbon::createFromFormat('H:i:s', $request->waktu_masuk)->format('H:i:s');

        $shift = new Shift();
        $shift->toko_id = $request->toko_id;
        $shift->kasir_id = $request->kasir_id;
        $shift->tanggal = $request->tanggal;
        $shift->waktu_masuk = $formattedTime;
        $shift->save();

        return response()->json(['success' => true]);
    }

    public function endShift(Request $request)
    {
        $request->validate([
            'waktu_keluar' => 'required|string',
            'toko_id' => 'required|integer',
            'kasir_id' => 'required|integer',
        ]);

        $formattedTime = Carbon::createFromFormat('H:i:s', $request->waktu_keluar)->format('H:i:s');

        $shift = Shift::where('kasir_id', $request->kasir_id)
            ->where('toko_id', $request->toko_id)
            ->whereNull('waktu_keluar')
            ->latest()
            ->first();

        if ($shift) {
            $shift->waktu_keluar = $formattedTime;
            $shift->save();
        }

        return response()->json(['success' => true]);
    }
}
