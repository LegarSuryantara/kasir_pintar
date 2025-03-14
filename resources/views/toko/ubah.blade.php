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
            Ubah Toko
        </h4>
        <form action="{{ route('toko.update', $tokos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nama_toko">
                    Nama Toko
                </label>
                <input class="form-control" value="{{ old('nama_toko', $tokos->nama_toko) }}" id="nama_toko" name="nama_toko" placeholder="Masukan Nama Toko" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="image_toko">
                    Gambar Toko
                </label>
                <input class="form-control" value="{{ old('image_toko', $tokos->image_toko) }}" id="image_toko" name="image_toko" placeholder="Masukkan Gambar Toko" type="file" />
                @if($tokos->image_toko)
                    <div class="mt-2">
                        <img src="{{ asset('storage/toko_images/'.$tokos->image_toko) }}" alt="Image Toko" class="img-fluid" width="150">
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label" for="no_hp">
                    No Handpone
                </label>
                <input class="form-control" value="{{ old('no_hp', $tokos->no_hp) }}" id="no_hp" name="no_hp" placeholder="Masukan No Handpone" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat">
                    Alamat
                </label>
                <input class="form-control" value="{{ old('alamat', $tokos->alamat) }}" id="alamat" name="alamat" placeholder="Masukan Alamat" type="text" />
            </div>

            <div class="mb-3">
                <label class="form-label" for="owner">
                    owner/pemilik
                </label>
                <select class="form-select" id="owner" name="user_id">
                    <option value="" selected disabled>Pilih owner</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $tokos->user_id ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</body>

</html>
