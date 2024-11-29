<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Kategori extends Model
{
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }

    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
}
