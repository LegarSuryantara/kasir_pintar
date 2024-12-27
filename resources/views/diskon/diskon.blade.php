@extends('layouts.app')

@section('title', 'Diskon')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Diskon</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('diskon.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah Diskon
                </a>
            </div>
            
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Diskon</th>
                        <th>Jumlah Barang</th>
                        <th>Persentase</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($diskons as $diskon)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $diskon->nama_diskon }}</td>
                        <td>{{ $diskon->jumlah_barang }}</td>
                        <td>{{ $diskon->presentase }}%</td>
                        <td>{{ $diskon->tanggal_mulai }}</td>
                        <td>{{ $diskon->tanggal_akhir }}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('diskon.delete', $diskon->id) }}" method="POST" class="d-inline">
                                <a href="{{ route('diskon.edit', $diskon->id) }}" class="btn btn-sm btn-primary">
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
                        <td colspan="6" class="text-center">Data Diskon belum Tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection