@extends('layouts.app')

@section('title', 'Tambah Cashdrawer')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Ubah Cashdrawer</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('cashdrawer.update', $cashdrawers->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Toko</label>
                    <select class="form-select" name="toko_id" required>
                        <option value="">Pilih Toko</option>
                        @foreach ($tokos as $toko)
                            <option value="{{ $toko->id }}">{{ $toko->nama_toko }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kasir</label>
                    <select class="form-select" name="kasir_id" required>
                        <option value="">Pilih Kasir</option>
                        @foreach ($kasirs as $kasir)
                            <option value="{{ $kasir->id }}">{{ $kasir->nama_kasir }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Shift</label>
                    <select class="form-select" name="shift_id" required>
                        <option value="">Pilih Shift</option>
                        @foreach ($shifts as $shift)
                            <option value="{{ $shift->id }}">Shift {{ $shift->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Uang Masuk</label>
                    <input type="number" class="form-control" name="uang_sebelum" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Uang Keluar</label>
                    <input type="number" class="form-control" name="uang_sesudah" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('cashdrawer.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection