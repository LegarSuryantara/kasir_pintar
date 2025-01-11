<html>

<head>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <style>
        body {
            background-color: #f0f7f5;
        }

        .container {
            max-width: 800px;
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
        <h4 class="text-center">Tambah Transaksi Penjualan</h4>
        <form action="{{ route('transaksi_penjualan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="id_customer">Nama Customer</label>
                <select class="form-control" id="id_customer" name="id_customer">
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->nama_customer }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="id_toko">Nama Toko</label>
                <select class="form-control" id="id_toko" name="id_toko">
                    @foreach($tokos as $toko)
                        <option value="{{ $toko->id }}">{{ $toko->nama_toko }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="id_kasir">Nama Kasir</label>
                <select class="form-control" id="id_kasir" name="id_kasir">
                    @foreach($kasirs as $kasir)
                        <option value="{{ $kasir->id }}">{{ $kasir->nama_kasir }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="id_diskon">Diskon</label>
                <select class="form-control" id="id_diskon" name="id_diskon">
                    @foreach($diskons as $diskon)
                        <option value="{{ $diskon->id }}">{{ $diskon->nama_diskon }} - {{ $diskon->presentase }}%</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="id_pajak">Pajak</label>
                <select class="form-control" id="id_pajak" name="id_pajak">
                    @foreach($pajaks as $pajak)
                        <option value="{{ $pajak->id }}">{{ $pajak->presentase }}%</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="subtotal">Subtotal</label>
                <input class="form-control" id="subtotal" name="subtotal" placeholder="Masukan Subtotal" type="number" step="0.01" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="total_penjualan">Total Penjualan</label>
                <input class="form-control" id="total_penjualan" name="total_penjualan" placeholder="Masukan Total Penjualan" type="number" step="0.01" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlah_barang">Jumlah Barang</label>
                <input class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Masukan Jumlah Barang" type="number" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="tanggal_penjualan">Tanggal Penjualan</label>
                <input class="form-control" id="tanggal_penjualan" name="tanggal_penjualan" type="datetime-local" />
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-secondary me-2" type="reset">Reset</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</body>

</html>
