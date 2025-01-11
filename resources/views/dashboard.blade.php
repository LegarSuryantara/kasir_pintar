@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h4 class="mb-4">Dashboard</h4>
    
    <!-- Navigasi Transaksi Penjualan -->
    <div class="mb-4">
        <a href="{{ route('transaksi_penjualan.create') }}" class="btn btn-primary">
            Tambah Transaksi Penjualan
        </a>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Barang</h5>
                            <h3 class="mb-0">{{ $totalBarang ?? 0 }}</h3>
                        </div>
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Kategori</h5>
                            <h3 class="mb-0">{{ $totalKategori ?? 0 }}</h3>
                        </div>
                        <i class="fas fa-tags fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Customer</h5>
                            <h3 class="mb-0">{{ $totalCustomer ?? 0 }}</h3>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title">Total Toko</h5>
                            <h3 class="mb-0">{{ $totalToko ?? 0 }}</h3>
                        </div>
                        <i class="fas fa-store fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Barang Terbaru</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Toko</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($barangTerbaru ?? [] as $barang)
                            <tr>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->kategori->kategori }}</td>
                                <td>{{ $barang->toko_id }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Customer Terbaru</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Hp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($customerTerbaru ?? [] as $customer)
                            <tr>
                                <td>{{ $customer->nama_customer }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->no_hp }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
