@extends('layouts.app')

@section('title', 'Toko')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Toko</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('toko.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Toko
                </a>
            </div>
            
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>No HP</th>
                        <th>Alamat</th>
                        <th>Owner</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tokos as $toko)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $toko->nama_toko }}</td>
                        <td>{{ $toko->no_hp }}</td>
                        <td>{{ $toko->alamat }}</td>
                        <td>{{ $toko->user->username }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('toko.delete', $toko->id) }}" method="POST" class="d-inline">
                                <a href="{{ route('toko.edit', $toko->id) }}" class="btn btn-sm btn-primary">
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
                        <td colspan="5" class="text-center">Data Toko belum Tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection