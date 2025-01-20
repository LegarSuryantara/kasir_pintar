<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;


    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'toko_id',
        'kasir_id',
        'diskon_id',
        'pajak_id',
        'subtotal',
        'total_penjualan',
        'jumlah_barang',
        'tanggal_penjualan'
    ];

    // Timestamps (created_at dan updated_at) secara otomatis diaktifkan
    public $timestamps = true;

    /**
     * Relasi dengan model Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }

    /**
     * Relasi dengan model Toko
     */
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }

    /**
     * Relasi dengan model Kasir
     */
    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id', 'id');
    }

    /**
     * Relasi dengan model Diskon
     */
    public function diskon()
    {
        return $this->belongsTo(Diskon::class, 'diskon_id', 'id');
    }

    /**
     * Relasi dengan model Pajak
     */
    public function pajak()
    {
        return $this->belongsTo(Pajak::class, 'pajak_id', 'id');
    }
}
