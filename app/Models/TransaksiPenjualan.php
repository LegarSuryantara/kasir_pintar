<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'transaksi_penjualan';

    // Primary key
    protected $primaryKey = 'id_penjualan';

    // Tipe primary key (non-incrementing jika bukan auto_increment)
    public $incrementing = true;

    // Tipe data primary key
    protected $keyType = 'bigint';

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'id_customer',
        'id_toko',
        'id_kasir',
        'id_diskon',
        'id_pajak',
        'subtotal',
        'total_penjualan',
        'jumlah_barang',
        'tanggal_penjualan',
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
        return $this->belongsTo(Toko::class, 'id_toko', 'id');
    }

    /**
     * Relasi dengan model Kasir
     */
    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'id_kasir', 'id');
    }

    /**
     * Relasi dengan model Diskon
     */
    public function diskon()
    {
        return $this->belongsTo(Diskon::class, 'id_diskon', 'id');
    }

    /**
     * Relasi dengan model Pajak
     */
    public function pajak()
    {
        return $this->belongsTo(Pajak::class, 'id_pajak', 'id');
    }
}
