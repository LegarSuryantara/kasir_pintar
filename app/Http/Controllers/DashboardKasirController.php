<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\TransaksiPenjualan;
use App\Models\DetailPenjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardKasirController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();

        
        $cart = session()->get('cart', []);

        
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        
        $ppn = $subtotal * 0.1;  

        
        $total = $subtotal + $ppn;

        return view('dashboardKasir', compact('barangs', 'cart', 'subtotal', 'total', 'ppn'));
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

        // dd([
        //     'request' => $request->all(),
        //     'cart' => session()->get('cart', []),
        // ]);

        DB::beginTransaction();
       
            $cart = session()->get('cart', []);

            if (empty($cart)) {
                return redirect()->route('dashboardKasir.index')->with('error', 'Keranjang belanja kosong.');
            }

            $subtotal = 0;
            $total_barang = 0; 
            foreach ($cart as $item) {
                $subtotal += $item['price'] * $item['quantity'];
                $total_barang += $item['quantity'];
            }

            $ppn = $subtotal * 0.03;
            $total_harga = $subtotal + $ppn;

            $transaksi = TransaksiPenjualan::create([
                'toko_id' => 1,
                'kasir_id' => \Illuminate\Support\Facades\Auth::user()->id,
                'diskon_id' => 1,
                'pajak_id' => 1, 
                'subtotal' => $subtotal,
                'jumlah_barang' => $total_barang,
                'total_harga' => $total_harga,
                'metode_pembayaran' => $request->metode_pembayaran,
                'tanggal_penjualan' => now(),
            ]);
            

            foreach ($cart as $item) {
                DetailPenjualan::create([
                    'transaksi_penjualan_id' => $transaksi->id,
                    'barang_id' => $item['id'],
                    'jumlah_barang' => $item['quantity'],
                    'harga_satuan' => $item['price'],
                    'total_harga' => $item['price'] * $item['quantity'],
                ]);

                // $barang = Barang::find($item['id']);
                // if ($barang) {
                //     $barang->stok -= $item['quantity'];
                //     $barang->save();
                // }
            }

            session()->forget('cart');
            DB::commit();
            return redirect()->route('dashboardKasir.index')->with('success', 'Transaksi berhasil disimpan.');
      

        
    }

    
    
}
