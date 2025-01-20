@extends('layouts.app')

@section('title', 'Daftar Transaksi Penjualan')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Daftar Transaksi Penjualan</h4>
        <a href="{{ route('transaksi_penjualan.create') }}" class="btn btn-primary">Tambah Transaksi</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Toko</th>
                    <th>Kasir</th>
                    <th>Subtotal</th>
                    <th>Total Penjualan</th>
                    <th>Jumlah Barang</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksiPenjualans as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi->toko->nama_toko }}</td>
                        <td>{{ $transaksi->kasir->nama_kasir }}</td>
                        <td>Rp {{ number_format($transaksi->subtotal, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($transaksi->total_penjualan, 0, ',', '.') }}</td>
                        <td>{{ $transaksi->jumlah_barang }}</td>
                        <td>{{ date('d/m/Y', strtotime($transaksi->tanggal_penjualan)) }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('transaksi_penjualan.show', $transaksi->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('transaksi_penjualan.edit', $transaksi->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('transaksi_penjualan.delete', $transaksi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
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