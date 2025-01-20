@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4">Daftar Akun</h4>

                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-Mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">No. HP Aktif</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">Saya telah membaca dan menyetujui Syarat Ketentuan & Kebijakan Privasi</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="g-recaptcha" data-sitekey="your-site-key"></div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Daftar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
