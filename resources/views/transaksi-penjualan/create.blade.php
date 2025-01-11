@extends('layouts.app')

@section('title', 'Tambah Transaksi Penjualan')

@section('content')
<div class="container">
    <h4 class="mb-4">Tambah Transaksi Penjualan</h4>

    <form action="{{ route('transaksi-penjualan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_customer" class="form-label">Customer</label>
            <select id="id_customer" name="id_customer" class="form-control">
                <option value="">Pilih Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('id_customer') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->nama_customer }}
                    </option>
                @endforeach
            </select>
            @error('id_customer')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_toko" class="form-label">Toko</label>
            <select id="id_toko" name="id_toko" class="form-control">
                <option value="">Pilih Toko</option>
                @foreach($tokos as $toko)
                    <option value="{{ $toko->id }}" {{ old('id_toko') == $toko->id ? 'selected' : '' }}>
                        {{ $toko->nama_toko }}
                    </option>
                @endforeach
            </select>
            @error('id_toko')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_kasir" class="form-label">Kasir</label>
            <select id="id_kasir" name="id_kasir" class="form-control">
                <option value="">Pilih Kasir</option>
                @foreach($kasirs as $kasir)
                    <option value="{{ $kasir->id }}" {{ old('id_kasir') == $kasir->id ? 'selected' : '' }}>
                        {{ $kasir->nama_kasir }}
                    </option>
                @endforeach
            </select>
            @error('id_kasir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_diskon" class="form-label">Diskon (Opsional)</label>
            <select id="id_diskon" name="id_diskon" class="form-control">
                <option value="">Pilih Diskon</option>
                @foreach($diskons as $diskon)
                    <option value="{{ $diskon->id }}" {{ old('id_diskon') == $diskon->id ? 'selected' : '' }}>
                        {{ $diskon->nama_diskon }}
                    </option>
                @endforeach
            </select>
            @error('id_diskon')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_pajak" class="form-label">Pajak (Opsional)</label>
            <select id="id_pajak" name="id_pajak" class="form-control">
                <option value="">Pilih Pajak</option>
                @foreach($pajaks as $pajak)
                    <option value="{{ $pajak->id }}" {{ old('id_pajak') == $pajak->id ? 'selected' : '' }}>
                        {{ $pajak->nama_pajak }}
                    </option>
                @endforeach
            </select>
            @error('id_pajak')
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
