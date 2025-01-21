<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\TransaksiPenjualan;
use App\Models\CashDrawer;
use App\Models\Shift;

class LoginKasirController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboardKasir.index');
        }
        return view('auth.loginKasir');
    }

    /**
     * Proses autentikasi login.
     */
    public function authenticate(Request $request)
    {
        // Validasi data kasir yang hanya menggunakan ID dan Nama Kasir
        $credentials = $request->validate([
            'id' => 'required|integer',
            'nama_kasir' => 'required|string',
        ]);

        // Cari kasir berdasarkan id dan nama_kasir
        $kasir = Kasir::where('id', $request->id)
            ->where('nama_kasir', $request->nama_kasir)
            ->first();

        // Pastikan kasir ditemukan dan login
        if ($kasir) {
            Auth::guard('kasir')->login($kasir);
            $request->session()->regenerate();

            // Redirect ke dashboard kasir
            return redirect()->route('dashboardKasir.index');
        }

        // Jika login gagal
        return back()->withErrors([
            'id' => 'ID kasir atau nama kasir salah.',
        ]);
    }

    public function logout(Request $request)
    {
        $kasir = Auth::guard('kasir')->user(); // Ambil data kasir yang login
        if ($kasir) {
            $tokoId = $kasir->toko_id;
            $kasirId = $kasir->id;

            // Ambil shift terakhir berdasarkan kasir
            $shift = Shift::where('kasir_id', $kasirId)
                ->latest('id')
                ->first();

            $shiftId = $shift ? $shift->id : 2; // Default ke 1 jika tidak ada shift

            // Ambil cashdrawer terakhir untuk kasir ini
            $lastCashDrawer = CashDrawer::where('kasir_id', $kasirId)
                ->where('toko_id', $tokoId)
                ->latest()
                ->first();

            $uangSebelum = $lastCashDrawer ? $lastCashDrawer->uang_sesudah : 0;

            // Hitung rekap transaksi selama sesi
            $transaksi = TransaksiPenjualan::where('kasir_id', $kasirId)
                ->where('toko_id', $tokoId)
                ->get();

            $uangSesudah = $transaksi->sum('total_harga');

            // Simpan rekap ke tabel cash_drawers
            CashDrawer::create([
                'toko_id' => $tokoId,
                'kasir_id' => $kasirId,
                'shift_id' => $shiftId, // Gunakan shift terakhir
                'uang_sebelum' => $uangSebelum,
                'uang_sesudah' => $uangSebelum + $uangSesudah,
            ]);
        }

        // Logout kasir
        Auth::guard('kasir')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginKasir')->with('success', 'Anda telah berhasil logout');
    }
}
