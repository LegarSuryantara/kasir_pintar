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
            Ubah Kasir
        </h4>
        <form action="{{ route('kasir.update', $kasir->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nama_kasir">
                    Nama Kasir
                </label>
                <input class="form-control" value="{{ old('nama_kasir', $kasir->nama_kasir) }}" id="nama_kasir" name="nama_kasir" placeholder="Masukan Nama Kasir" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="no_hp">
                    No Handpone
                </label>
                <input class="form-control" value="{{ old('no_hp', $kasir->no_hp) }}" id="no_hp" name="no_hp" placeholder="Masukan No Handpone" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="alamat">
                    Alamat
                </label>
                <input class="form-control" value="{{ old('alamat', $kasir->alamat) }}" id="alamat" name="alamat" placeholder="Masukan Alamat" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="toko">
                    Toko/Tempat Bekerja
                </label>
                <select class="form-select" id="toko" name="toko_id">
                    <option value="" selected disabled>Pilih Toko</option>
                    @foreach ($tokos as $toko)
                    <option value="{{ $toko->id }}" {{ $toko->id == $kasir->toko_id ? 'selected' : '' }}>
                            {{ $toko->nama_toko }}
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