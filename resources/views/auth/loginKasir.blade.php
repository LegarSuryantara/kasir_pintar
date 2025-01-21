@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4">Login Kasir</h4>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('loginKasir.authenticate') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">ID Kasir</label>
                            <input type="number" 
                                   class="form-control @error('id') is-invalid @enderror" 
                                   id="id" 
                                   name="id" 
                                   value="{{ old('id') }}" 
                                   required 
                                   autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="nama_kasir" class="form-label">Nama Kasir</label>
                            <input type="text" 
                                class="form-control @error('nama_kasir') is-invalid @enderror" 
                                id="nama_kasir" 
                                name="nama_kasir" 
                                value="{{ old('nama_kasir') }}" 
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
