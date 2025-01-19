<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'toko_id',
        'kasir_id',
        'diskon_id',
        'pajak_id',
        'subtotal',
        'total_harga',
        'metode_pembayaran',
        'jumlah_barang',
        'tanggal_penjualan',
    ];

    public $timestamps = true;


    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }

    public function diskon()
    {
        return $this->belongsTo(Diskon::class);
    }

    public function pajak()
    {
        return $this->belongsTo(Pajak::class);
    }

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
