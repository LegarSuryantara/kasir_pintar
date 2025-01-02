@extends('layouts.app')

@section('title', 'Shift')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Shift</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('shift.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah shift
                </a>
            </div>
            
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Kasir</th>
                        <th>Nama toko</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shifts as $shift)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $shift->kasir->nama_kasir }}</td>
                        <td>{{ $shift->toko->nama_toko }}</td>
                        <td>{{ $shift->waktu_masuk }}</td>
                        <td>{{ $shift->waktu_keluar }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('shift.delete', $shift->id) }}" method="POST" class="d-inline">
                                <a href="{{ route('shift.edit', $shift->id) }}" class="btn btn-sm btn-primary">
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
                        <td colspan="6" class="text-center">Data Shift belum Tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection