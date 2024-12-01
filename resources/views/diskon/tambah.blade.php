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
            Tambah Diskon
        </h4>
        <form action="{{ route('diskon.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nama_diskon">
                    Nama Diskon
                </label>
                <input class="form-control" id="nama_diskon" name="nama_diskon" placeholder="Min 3 Huruf" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlah_barang">
                    Jumlah Barang
                </label>
                <input class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Min 3 Huruf" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="presentase">
                    Presentase
                </label>
                <input class="form-control" id="presentase" name="presentase" placeholder="Min 3 Huruf" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="tanggal_mulai">
                    Tanggal Mulai
                </label>
                <input class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Min 3 Huruf" type="date" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="tanggal_akhir">
                    Tanggal Berakhir
                </label>
                <input class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Min 3 Huruf" type="date" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="toko">
                    Toko
                </label>
                <select class="form-select" id="toko" name="toko_id">
                    <option value="" selected disabled>Pilih Toko</option>
                    @foreach ($tokos as $toko)
                    <option value="{{ $toko->id }}">{{ $toko->nama_toko }}</option>
                    @endforeach
                </select>
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