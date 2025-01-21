<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
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
        $transaksiPenjualans = TransaksiPenjualan::with('toko', 'kasir', 'diskon', 'pajak')->get();
        return view("transaksipenjualan.index", compact("transaksiPenjualans"));
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
            'toko_id' => 'required|exists:tokos,id',
            'kasir_id' => 'required|exists:kasirs,id',
            'diskon_id' => 'nullable|exists:diskons,id',
            'pajak_id' => 'nullable|exists:pajaks,id',
            'subtotal' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'jumlah_barang' => 'required|integer',
            'tanggal_penjualan' => 'required|date',
        ]);

        // Membuat transaksi penjualan baru

        TransaksiPenjualan::create($request->all());
        $transaksiPenjualan = TransaksiPenjualan::create([
            'id_customer' => $request->id_customer,
            'toko_id' => $request->toko_id,
            'kasir_id' => $request->kasir_id,
            'diskon_id' => $request->diskon_id,
            'pajak_id' => $request->pajak_id,
            'subtotal' => $request->subtotal,
            'total_harga' => $request->total_harga,
            'jumlah_barang' => $request->jumlah_barang,
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);


        return redirect()
            ->route('transaksi_penjualan.index')
            ->with('success', 'Transaksi Penjualan berhasil ditambahkan');
    }

    /**
     * Menampilkan detail transaksi penjualan berdasarkan ID.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = TransaksiPenjualan::with('toko', 'kasir', 'diskon', 'pajak')->findOrFail($id);
        return view('transaksi-penjualan.show', compact('transaksi'));
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
            
            'toko_id' => 'required|exists:tokos,id',
            'kasir_id' => 'required|exists:kasirs,id',
            'diskon_id' => 'nullable|exists:diskons,id',
            'pajak_id' => 'nullable|exists:pajaks,id',
            'subtotal' => 'required|numeric',
            'total_harga' => 'required|numeric',
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
            'toko_id' => $request->toko_id,
            'kasir_id' => $request->kasir_id,
            'diskon_id' => $request->diskon_id,
            'pajak_id' => $request->pajak_id,
            'subtotal' => $request->subtotal,
            'total_harga' => $request->total_harga,
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
        $tokos = Toko::all();
        $kasirs = Kasir::all();
        $diskons = Diskon::all();
        $pajaks = Pajak::all();

        return view('transaksi-penjualan.create', compact('tokos', 'kasirs', 'diskons', 'pajaks'));

    }

    /**
     * Menghapus transaksi penjualan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $transaksiPenjualan = TransaksiPenjualan::findOrFail($id);
        $transaksiPenjualan->delete();

        return redirect()
            ->route('transaksi_penjualan.index')
            ->with('success', 'Transaksi Penjualan berhasil dihapus');

    }
}
