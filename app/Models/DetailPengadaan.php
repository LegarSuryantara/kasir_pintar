<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailPengadaan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'harga_dasar',
        'harga_jual',
        'stok',
        'pengadaan_id',
        'barang_id'
    ];

    public function pengadaan(): BelongsTo
    {
        return $this->belongsTo(Pengadaan::class);
    }
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class);
    }

}
