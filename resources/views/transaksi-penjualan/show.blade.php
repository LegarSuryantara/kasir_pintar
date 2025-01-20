@extends('layouts.app')

@section('title', 'Detail Transaksi Penjualan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Transaksi Penjualan</h5>
            <a href="{{ route('transaksi_penjualan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="200">Toko</th>
                    <td>{{ $transaksi->toko->nama_toko }}</td>
                </tr>
                <tr>
                    <th>Kasir</th>
                    <td>{{ $transaksi->kasir->nama_kasir }}</td>
                </tr>
                <tr>
                    <th>Diskon</th>
                    <td>
                        @if($transaksi->diskon)
                            {{ $transaksi->diskon->nama_diskon }} ({{ $transaksi->diskon->presentase }}%)
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Pajak</th>
                    <td>
                        @if($transaksi->pajak)
                            {{ $transaksi->pajak->presentase }}%
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Subtotal</th>
                    <td>Rp {{ number_format($transaksi->subtotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Total Penjualan</th>
                    <td>Rp {{ number_format($transaksi->total_penjualan, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Barang</th>
                    <td>{{ $transaksi->jumlah_barang }}</td>
                </tr>
                <tr>
                    <th>Tanggal Penjualan</th>
                    <td>{{ date('d/m/Y H:i', strtotime($transaksi->tanggal_penjualan)) }}</td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ date('d/m/Y H:i', strtotime($transaksi->created_at)) }}</td>
                </tr>
            </table>

            <div class="mt-3 d-flex justify-content-end gap-2">
                <a href="{{ route('transaksi_penjualan.edit', $transaksi->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('transaksi_penjualan.delete', $transaksi->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 