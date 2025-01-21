@extends('layouts.app')

@section('title', 'Daftar Transaksi Penjualan')

@section('content')
<div class="container">

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Toko</th>
                    <th>Kasir</th>
                    <th>Pajak</th>
                    <th>Diskon</th>
                    <th>Subtotal</th>
                    <th>Total Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksiPenjualans as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->toko->nama_toko }}</td>
                        <td>{{ $transaksi->kasir->nama_kasir }}</td>
                        <td>{{ $transaksi->pajak->presentase }}</td>
                        <td>{{ $transaksi->diskon->nama_diskon }}</td>
                        <td>Rp {{ number_format($transaksi->subtotal, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $transaksi->metode_pembayaran }}</td>
                        <td>{{ $transaksi->jumlah_barang }}</td>
                        <td>{{ date('d/m/Y', strtotime($transaksi->tanggal_penjualan)) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data transaksi penjualan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection 