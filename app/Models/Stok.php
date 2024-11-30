<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stok extends Model
{
    use HasFactory;
    protected $fillable = [
        'toko_id',
        'barang_id',
        'detail_pengadaan_id',
        'jumlah_stok'
    ];
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    } 
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
    public function detailPengadaan(): BelongsTo
    {
        return $this->belongsTo(detailPengadaan::class);
    }
}
