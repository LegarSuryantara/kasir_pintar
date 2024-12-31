@extends('layouts.app')

@section('title', 'Kasir')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Kasir</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('kasir.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Kasir
                </a>
            </div>
            
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Kasir</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Toko</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kasirs as $kasir)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kasir->nama_kasir }}</td>
                        <td>{{ $kasir->no_hp }}</td>
                        <td>{{ $kasir->alamat }}</td>
                        <td>{{ $kasir->toko->nama_toko }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kasir.delete', $kasir->id) }}" method="POST" class="d-inline">
                                <a href="{{ route('kasir.edit', $kasir->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Data Kasir belum Tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection