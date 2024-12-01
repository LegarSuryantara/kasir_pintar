<html>

<head>
    <title>Daftar Kasir</title>
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
        <h4>Kasir</h4>
        <p>Daftar Kasir</p>
        <div class="d-flex mb-3">
            <a href=" {{ route('kasir.create') }}" class="btn btn-success me-2">Tambah Kasir</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Kasir</th>
                    <th>Nama</th>
                    <th>No Handpone</th>
                    <th>Alamat</th>
                    <th>Toko/Tempat Bekerja</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kasirs as $kasir)
                <tr>
                    <td>{{ $loop->iteration }}
                    <td>{{ $kasir->id }}</td>
                    <td>{{ $kasir->nama_kasir }}</td>
                    <td>{{ $kasir->no_hp }}</td>
                    <td>{{ $kasir->alamat }}</td>
                    <td>{{ $kasir->toko->nama_toko }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kasir.delete', $kasir->id) }}" method="POST">
                            <a href="{{ route('kasir.edit', $kasir->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data kasir belum Tersedia.
                </div>
                @endforelse
            </tbody>
            <div class="d-flex justify-content-between">
                

            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>