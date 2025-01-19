<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_penjualan_id', 'barang_id', 'jumlah_barang', 
        'harga_satuan', 'total_harga'
    ];

    public function transaksiPenjualan():BelongsTo
    {
        return $this->belongsTo(TransaksiPenjualan::class);
    }
    public function barang():BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
