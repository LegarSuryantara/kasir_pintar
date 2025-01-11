<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use App\Models\Customer; // Tambahkan use statement untuk model Customer
use App\Models\Toko; // Tambahkan use statement untuk model Toko
use App\Models\Kasir; // Tambahkan use statement untuk model Kasir
use App\Models\Diskon; // Tambahkan use statement untuk model Diskon
use App\Models\Pajak; // Tambahkan use statement untuk model Pajak
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    /**
     * Menampilkan daftar transaksi penjualan.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksiPenjualans = TransaksiPenjualan::with('customer', 'toko', 'kasir', 'diskon', 'pajak')->get();
        return response()->json($transaksiPenjualans);
    }

    /**
     * Menyimpan transaksi penjualan baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_customer' => 'required|exists:customers,id',
            'id_toko' => 'required|exists:tokos,id',
            'id_kasir' => 'required|exists:kasirs,id',
            'id_diskon' => 'nullable|exists:diskons,id',
            'id_pajak' => 'nullable|exists:pajaks,id',
            'subtotal' => 'required|numeric',
            'total_penjualan' => 'required|numeric',
            'jumlah_barang' => 'required|integer',
            'tanggal_penjualan' => 'required|date',
        ]);

        // Membuat transaksi penjualan baru
        $transaksiPenjualan = TransaksiPenjualan::create([
            'id_customer' => $request->id_customer,
            'id_toko' => $request->id_toko,
            'id_kasir' => $request->id_kasir,
            'id_diskon' => $request->id_diskon,
            'id_pajak' => $request->id_pajak,
            'subtotal' => $request->subtotal,
            'total_penjualan' => $request->total_penjualan,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);

        return response()->json($transaksiPenjualan, 201);
    }

    /**
     * Menampilkan detail transaksi penjualan berdasarkan ID.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksiPenjualan = TransaksiPenjualan::with('customer', 'toko', 'kasir', 'diskon', 'pajak')->find($id);

        if (!$transaksiPenjualan) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        return response()->json($transaksiPenjualan);
    }

    /**
     * Memperbarui transaksi penjualan yang ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_customer' => 'required|exists:customers,id',
            'id_toko' => 'required|exists:tokos,id',
            'id_kasir' => 'required|exists:kasirs,id',
            'id_diskon' => 'nullable|exists:diskons,id',
            'id_pajak' => 'nullable|exists:pajaks,id',
            'subtotal' => 'required|numeric',
            'total_penjualan' => 'required|numeric',
            'jumlah_barang' => 'required|integer',
            'tanggal_penjualan' => 'required|date',
        ]);

        // Cari transaksi penjualan berdasarkan ID
        $transaksiPenjualan = TransaksiPenjualan::find($id);

        if (!$transaksiPenjualan) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        // Memperbarui data transaksi penjualan
        $transaksiPenjualan->update([
            'id_customer' => $request->id_customer,
            'id_toko' => $request->id_toko,
            'id_kasir' => $request->id_kasir,
            'id_diskon' => $request->id_diskon,
            'id_pajak' => $request->id_pajak,
            'subtotal' => $request->subtotal,
            'total_penjualan' => $request->total_penjualan,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);

        return response()->json($transaksiPenjualan);
    }

    /**
     * Menghapus transaksi penjualan berdasarkan ID.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksiPenjualan = TransaksiPenjualan::find($id);

        if (!$transaksiPenjualan) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $transaksiPenjualan->delete();

        return response()->json(['message' => 'Transaksi berhasil dihapus']);
    }

    /**
     * Menampilkan form untuk membuat transaksi penjualan.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $customers = Customer::all();
        $tokos = Toko::all();
        $kasirs = Kasir::all();
        $diskons = Diskon::all();
        $pajaks = Pajak::all();

        return view('transaksi-penjualan.create', compact('customers', 'tokos', 'kasirs', 'diskons', 'pajaks'));
    }
}
