@extends('layouts.app')

@section('title', 'Cashdrawer')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Cashdrawer</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('cashdrawer.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Cashdrawer
                </a>
            </div>
            
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Toko</th>
                        <th>Kasir</th>
                        <th>Waktu masuk</th>
                        <th>Waktu keluar</th>
                        <th>Uang sebelum</th>
                        <th>Uang sesudah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cashdrawers as $cashdrawer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cashdrawer->toko->nama_toko}}</td>
                        <td>{{ $cashdrawer->kasir->nama_kasir }}</td>
                        <td>{{ $cashdrawer->shift->waktu_masuk }}</td>
                        <td>{{ $cashdrawer->shift->waktu_keluar }}</td>
                        <td>{{ $cashdrawer->uang_sebelum }}</td>
                        <td>{{ $cashdrawer->uang_sesudah }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('cashdrawer.delete', $cashdrawer->id) }}" method="POST" class="d-inline">
                                <a href="{{ route('cashdrawer.edit', $cashdrawer->id) }}" class="btn btn-sm btn-primary">
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
                        <td colspan="5" class="text-center">Data Cashdrawer belum Tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection