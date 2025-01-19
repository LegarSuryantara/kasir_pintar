@extends('layouts.appKasir')

@section('title', 'List Item')

@section('content')
<div class="container">
    <div class="container mt-4">
        <div class="row search-bar">
            <div class="col-12">
                <h4>Cari Produk</h4>
                <div class="input-group">
                    <input class="form-control" placeholder="Cari Produk" type="text" id="searchProduct" />
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="row filter-buttons">
            <div class="col-12">
                <button class="btn btn-outline-secondary active">All</button>
                <button class="btn btn-outline-secondary">Makanan</button>
                <button class="btn btn-outline-secondary">Minuman</button>
                <button class="btn btn-outline-secondary">Snack</button>
            </div>
        </div>
        <div class="row">
            @foreach($barangs as $barang)
            <div class="col-6 col-md-3">
                <div class="product-card">
                    <img alt="{{ $barang->nama_barang }}" src="{{ $barang->image_barang }}" width="150" height="150" />
                    <div class="product-name">
                        {{ $barang->nama_barang }}
                    </div>
                    <div class="product-price">
                        Rp. {{ number_format($barang->harga_jual, 0, ',', '.') }}
                    </div>
                    <!-- Tombol untuk menambah barang ke pesanan -->
                    <a href="{{ route('dashboardKasir.addItem', ['id' => $barang->id]) }}" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function addToCart(product) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Cek apakah barang sudah ada di dalam keranjang
        let existingProduct = cart.find(item => item.id === product.id);
        if (existingProduct) {
            existingProduct.jumlah += 1; // Jika sudah ada, tambahkan jumlahnya
        } else {
            product.jumlah = 1; // Jika belum ada, set jumlah awal ke 1
            cart.push(product);
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        alert(product.nama_barang + " ditambahkan ke pesanan!");
    }
</script>
@endsection