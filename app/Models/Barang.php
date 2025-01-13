<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'image_barang',
        'kategori_id',
        'toko_id',
    ];


    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }

    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class);
    }

    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class);
    }

    public function detailPengadaan(): HasMany
    {
        return $this->hasMany(DetailPengadaan::class);
    }
}
