@extends('layouts.appKasir')

@section('title', 'Dashboard')

@section('content')
<style>
    @media print {
    /* Reset sembunyikan semua elemen */
    body * {
        visibility: hidden;
    }
    
    /* Tampilkan hanya area yang ingin dicetak */
    .printable-area,
    .printable-area * {
        visibility: visible;
    }
    
    /* Atur posisi area yang dicetak */
    .printable-area {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
    
    /* Sembunyikan tombol yang tidak perlu dicetak */
    .btn-cancel,
    .btn-pay,
    select,
    form {
        display: none !important;
    }
}
</style>

<div class="container">
    <h4 class="mb-4">Dashboard Kasir</h4>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="order-summary printable-area"> <!-- Tambahkan kelas printable-area -->
                    <p>
                        {{ now()->format('d F Y') }}, No.{{ $nomorTransaksi }}
                    </p>
                    <p>Kasir: {{ auth()->user()->nama_kasir }}</p>
                    @php
                    // Ambil data keranjang dan hitung subtotal, PPN, dan total
                    $cart = session()->get('cart', []);
                    $subtotal = 0;
                    foreach ($cart as $item) {
                        $subtotal += $item['price'] * $item['quantity'];
                    }

                    $ppn = $subtotal * $persentasePajak; // Misalnya PPN 3%
                    $total = $subtotal + $ppn;
                    @endphp
                    @foreach($cart as $item)
                    <div class="d-flex justify-content-between">
                        <span>{{ $item['name'] }}</span>
                        <span>{{ $item['quantity'] }} x Rp. {{ number_format($item['price'], 0, ',', '.') }}</span>
                    </div>
                    @endforeach
                    <hr />
                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>Rp. {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>PPN ({{ $persentasePajak * 100 }}%)</span>
                        <span>Rp. {{ number_format($ppn, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between total">
                        <span>Total</span>
                        <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between total">
                        <span>PAYMENT TOTAL</span>
                        <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <form action="{{ route('dashboardKasir.bayar') }}" method="POST">
                        @csrf
                        <label>Metode Pembayaran:</label>
                        <select name="metode_pembayaran" id='metode_pembayaran' required>
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                        </select>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('dashboardKasir.batal') }}" class="btn-cancel">
                                Batal
                            </a>
                            <button type="submit" class="btn-pay" onclick="window.print()">
                                Bayar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                @foreach($cart as $item)
                <div class="order-item mt-2">
                    <div class="d-flex align-items-center">
                        <img alt="{{ $item['name'] }}" class="me-3" src="https://placehold.co/80x80" />
                        <div class="item-details flex-grow-1">
                            <span class="item-name">
                                {{ $item['name'] }}
                            </span>
                            <div class="d-flex align-items-center">
                                <input class="form-control me-2" style="width: 60px;" type="number" readonly value="{{ $item['quantity'] }}" />
                                <span class="item-price">
                                    Rp. {{ number_format($item['price'], 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                        <a href="{{ route('removeItem', ['id' => $loop->index]) }}" class="btn btn-link text-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
                @endforeach
                <a class="add-item-btn" href="{{ route('addItems.index') }}">
                    +
                </a>
            </div>
        </div>
    </div>
</div>
@endsection