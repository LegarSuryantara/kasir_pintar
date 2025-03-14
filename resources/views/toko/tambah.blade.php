<html>

<head>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <style>
        body {
            background-color: #f0f7f5;
        }

        .container {
            max-width: 600px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-check-label {
            font-size: 14px;
        }

        .form-text {
            font-size: 12px;
            color: #6c757d;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        <h4 class="text-center">
            Tambah Barang
        </h4>
        <form action="{{ route('toko.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nama_toko">
                    Nama Toko
                </label>
                <input class="form-control" id="nama_toko" name="nama_toko" placeholder="Masukan Nama Toko" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="image_toko">Upload Gambar</label>
                <input class="form-control @error('image_toko') is-invalid @enderror" type="file" name="image_toko" id="image_toko" />
                @error('image_toko')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="no_hp">
                    No Handpone
                </label>
                <input class="form-control" id="no_hp" name="no_hp" placeholder="Masukan No Handpone" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat">
                    Alamat
                </label>
                <input class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="owner">
                    owner
                </label>
                <div class="mb-3">
                    <label class="form-label" for="owner">
                        Owner
                    </label>
                    <select class="form-select" id="owner" name="user_id">
                        <option value="" selected disabled>Pilih Owner</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-secondary me-2" type="reset">
                    Reset
                </button>
                <button class="btn btn-primary" type="submit">
                    Add
                </button>
            </div>
        </form>
    </div>
</body>

</html>
