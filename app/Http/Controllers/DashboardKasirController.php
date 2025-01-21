<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\TransaksiPenjualan;
use App\Models\DetailPenjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardKasirController extends Controller
{
    public function index()
    {
        // Ambil kasir yang sedang login
        $kasir = Auth::guard('kasir')->user();
        $tokoId = $kasir->toko_id; // ID toko

        $barangs = Barang::all();

        // Ambil data pajak toko
        $pajak = DB::table('pajaks')->where('toko_id', $tokoId)->latest('created_at')->first();
        $persentasePajak = $pajak ? $pajak->presentase / 100 : 0; // Default pajak 0%

        $transaksiTerakhir = TransaksiPenjualan::where('toko_id', $tokoId)->count();
        $nomorTransaksi = $transaksiTerakhir + 1;

        // Ambil keranjang
        $cart = session()->get('cart', []);
        $subtotal = 0;

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $ppn = $subtotal * $persentasePajak; // PPN berdasarkan persentase pajak
        $total = $subtotal + $ppn;

        return view('dashboardKasir', compact('barangs', 'cart', 'subtotal', 'total', 'ppn', 'persentasePajak', 'nomorTransaksi'));
    }

    public function addItem($id)
    {

        $barang = Barang::find($id);


        if (!$barang) {
            return redirect()->route('dashboardKasir.index')->with('error', 'Barang tidak ditemukan');
        }


        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $barang->id,
                'name' => $barang->nama_barang,
                'price' => $barang->harga_jual,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('dashboardKasir.index')->with('success', 'Barang berhasil ditambahkan ke pesanan');
    }

    public function batal()
    {

        session()->forget('cart');

        return redirect()->route('dashboardKasir.index')->with('info', 'Pesanan telah dibatalkan');
    }

    public function removeItem($id)
    {

        $cart = session()->get('cart', []);


        if (isset($cart[$id])) {

            unset($cart[$id]);


            session()->put('cart', $cart);


            return redirect()->route('dashboardKasir.index')->with('success', 'Item berhasil dihapus');
        }


        return redirect()->route('dashboardKasir.index')->with('error', 'Item tidak ditemukan di keranjang');
    }

    public function bayar(Request $request)
    {
        // Proses pembayaran di sini
    // Misalnya, simpan transaksi ke database

    // Ambil data yang diperlukan untuk struk
    
   
    // Redirect ke view struk
    
        DB::beginTransaction();

        try {
            // Ambil kasir yang sedang login
            $kasir = Auth::guard('kasir')->user();
            $tokoId = $kasir->toko_id; // ID toko

            // Ambil data diskon dan pajak
            $diskon = DB::table('diskons')->where('toko_id', $tokoId)->latest()->first();
            $pajak = DB::table('pajaks')->where('toko_id', $tokoId)->latest()->first();
            $persentaseDiskon = $diskon ? $diskon->presentase / 100 : 0;
            $persentasePajak = $pajak ? $pajak->presentase / 100 : 0;

            // Ambil keranjang
            $cart = session()->get('cart', []);
            if (empty($cart)) {
                return redirect()->route('dashboardKasir.index')->with('error', 'Keranjang belanja kosong.');
            }

            $subtotal = 0;
            $totalBarang = 0;

            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
                $totalBarang += $item['quantity'];
            }

            // Hitung diskon dan pajak
            $totalDiskon = $subtotal * $persentaseDiskon;
            $subtotalSetelahDiskon = $subtotal - $totalDiskon;
            $totalPajak = $subtotalSetelahDiskon * $persentasePajak;
            $totalHarga = $subtotalSetelahDiskon + $totalPajak;

            // Simpan transaksi penjualan
            $transaksi = TransaksiPenjualan::create([
                'toko_id' => $tokoId,
                'kasir_id' => $kasir->id,
                'diskon_id' => $diskon->id ?? null,
                'pajak_id' => $pajak->id ?? null,
                'subtotal' => $subtotal,
                'jumlah_barang' => $totalBarang,
                'total_harga' => $totalHarga,
                'metode_pembayaran' => $request->metode_pembayaran,
                'tanggal_penjualan' => now(),
            ]);

            // Simpan detail transaksi
            foreach ($cart as $item) {
                DetailPenjualan::create([
                    'transaksi_penjualan_id' => $transaksi->id,
                    'barang_id' => $item['id'],
                    'jumlah_barang' => $item['quantity'],
                    'harga_satuan' => $item['price'],
                    'total_harga' => $item['price'] * $item['quantity'],
                ]);
            }

            // Kosongkan keranjang
            session()->forget('cart');

            DB::commit();
            return redirect()->route('dashboardKasir.index')->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('dashboardKasir.index')->with('error', 'Terjadi kesalahan saat menyimpan transaksi.');
        }
        return view('struk', compact('nomorTransaksi', 'persentasePajak'));
    }
}
