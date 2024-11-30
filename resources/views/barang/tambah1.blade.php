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
        <form action="{{ route('barang.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nama_barang">
                    Nama Barang
                </label>
                <input class="form-control" id="nama_barang" name="nama_barang" placeholder="Min 3 Huruf" type="text" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="kategori">
                    Kategori
                </label>
                <select class="form-select" id="kategori" name="kategori_id">
                    <option value="" selected disabled>Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="harga_beli">
                    Harga Beli
                </label>
                <input class="form-control" id="harga_beli" name="harga_beli" placeholder="Rp 0" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="harga_jual">
                    Harga Jual
                </label>
                <input class="form-control" id="harga_jual" name="harga_jual" placeholder="Rp 0" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="stok">
                    Stock
                </label>
                <input class="form-control" id="stok" name="stok" placeholder="0" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="toko_id">
                    Kode toko
                </label>
                <input class="form-control" id="toko_id" name="toko_id" placeholder="0" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="supplier_d">
                    Kode supplier
                </label>
                <input class="form-control" id="supplier_id" name="supplier_id" placeholder="0" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="pengadaan_id">
                    Kode pengadaan
                </label>
                <input class="form-control" id="pengadaan_id" name="pengadaan_id" placeholder="0" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="barang_id">
                    Kode barang
                </label>
                <input class="form-control" id="barang_id" name="barang_id" placeholder="0" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="detail_pengadaan_id">
                    Kode Detail Pengadaan
                </label>
                <input class="form-control" id="detail_pengadaan_id" name="detail_pengadaan_id" placeholder="0" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="diskon">
                    Diskon
                </label>
                <select class="form-select" id="diskon" name="diskon_id">
                    <option value="" selected disabled>Pilih Diskon</option>
                    @foreach ($diskons as $diskon)
                    <option value="{{ $diskon->id }}">{{ $diskon->nama_diskon }}</option>
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