<html>

<head>
    <title>Barang atau Jasa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9f0f1;
        }

        .container {
            margin-top: 20px;
        }

        .btn-pro {
            background-color: #ffc107;
            color: #000;
        }

        .btn-pro:hover {
            background-color: #e0a800;
            color: #000;
        }

        .btn-disabled {
            background-color: #e0e0e0;
            color: #6c757d;
        }

        .btn-disabled:hover {
            background-color: #d6d6d6;
            color: #6c757d;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <h4>Barang atau Jasa</h4>
        <p>Database / Barang atau Jasa</p>
        <div class="d-flex mb-3">
            <a href=" {{ route('barang.create') }}
" class="btn btn-success me-2">Tambah Produk</a>
            <div class="ms-auto">
                <input type="text" class="form-control" placeholder="Cari Barang atau Jasa">
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga Jual (Rp)</th>
                    <th>Harga Dasar (Rp)</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stoks as $stok)
                <tr>
                    <td>{{ $stok->barang->id }}</td>
                    <td>{{ $stok->barang->nama_barang }}</td>
                    <td>{{ $stok->barang->kategori->kategori }}</td>
                    <td>{{ $stok->detailpengadaan->harga_jual }}</td>
                    <td>{{ $stok->detailpengadaan->harga_dasar }}</td>
                    <td>{{ $stok->jumlah_stok }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                            <a href="" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data Post belum Tersedia.
                </div>
                @endforelse
            </tbody>
            <div class="d-flex justify-content-between">
                <div>Showing 1 to 5 of 5 entries</div>
                <div>
                    <ul class="pagination mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3i5q5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i5Y5i