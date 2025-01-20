@extends('layouts.app')

@section('title', 'Tambah Transaksi Penjualan')

@section('content')
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h4 class="mb-4">Tambah Transaksi Penjualan</h4>

    <form action="{{ route('transaksi_penjualan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="toko_id" class="form-label">Toko</label>
            <select id="toko_id" name="toko_id" class="form-control">
                <option value="">Pilih Toko</option>
                @foreach($tokos as $toko)
                    <option value="{{ $toko->id }}" {{ old('toko_id') == $toko->id ? 'selected' : '' }}>
                        {{ $toko->nama_toko }}
                    </option>
                @endforeach
            </select>
            @error('toko_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kasir_id" class="form-label">Kasir</label>
            <select id="kasir_id" name="kasir_id" class="form-control">
                <option value="">Pilih Kasir</option>
                @foreach($kasirs as $kasir)
                    <option value="{{ $kasir->id }}" {{ old('kasir_id') == $kasir->id ? 'selected' : '' }}>
                        {{ $kasir->nama_kasir }}
                    </option>
                @endforeach
            </select>
            @error('kasir_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="diskon_id" class="form-label">Diskon (Opsional)</label>
            <select id="diskon_id" name="diskon_id" class="form-control">
                <option value="">Pilih Diskon</option>
                @foreach($diskons as $diskon)
                    <option value="{{ $diskon->id }}" {{ old('diskon_id') == $diskon->id ? 'selected' : '' }}>
                        {{ $diskon->nama_diskon }}
                    </option>
                @endforeach
            </select>
            @error('diskon_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="pajak_id" class="form-label">Pajak (Opsional)</label>
            <select id="pajak_id" name="pajak_id" class="form-control">
                <option value="">Pilih Pajak</option>
                @foreach($pajaks as $pajak)
                    <option value="{{ $pajak->id }}" {{ old('pajak_id') == $pajak->id ? 'selected' : '' }}>
                        {{ $pajak->presentase }}%
                    </option>
                @endforeach
            </select>
            @error('pajak_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="number" id="subtotal" name="subtotal" class="form-control" value="{{ old('subtotal') }}" required>
            @error('subtotal')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_penjualan" class="form-label">Total Penjualan</label>
            <input type="number" id="total_penjualan" name="total_penjualan" class="form-control" value="{{ old('total_penjualan') }}" required>
            @error('total_penjualan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
            <input type="number" id="jumlah_barang" name="jumlah_barang" class="form-control" value="{{ old('jumlah_barang') }}" required>
            @error('jumlah_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
            <input type="date" id="tanggal_penjualan" name="tanggal_penjualan" class="form-control" value="{{ old('tanggal_penjualan') }}" required>
            @error('tanggal_penjualan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-secondary me-2">Reset</button>
            <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
        </div>
    </form>
</div>
@endsection 