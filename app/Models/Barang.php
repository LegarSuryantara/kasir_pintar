<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class);
    }
    public function detailPengadaan(): HasMany
    {
        return $this->hasMany(DetailPengadaan::class);
    }
}
