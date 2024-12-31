@extends('layouts.app')

@section('title', 'Pajak')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Pajak</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('pajak.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Pajak
                </a>
            </div>
            
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Id Pajak</th>
                        <th>Persentase</th>
                        <th>Nama Toko</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pajaks as $pajak)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pajak->id }}</td>
                        <td>{{ $pajak->presentase }}%</td>
                        <td>{{ $pajak->toko->nama_toko }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pajak.delete', $pajak->id) }}" method="POST" class="d-inline">
                                <a href="{{ route('pajak.edit', $pajak->id) }}" class="btn btn-sm btn-primary">
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
                        <td colspan="5" class="text-center">Data Pajak belum Tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection