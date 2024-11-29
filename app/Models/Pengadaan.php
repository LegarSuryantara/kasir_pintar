<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengadaan extends Model
{
    public function detailPengadaan(): HasMany
    {
        return $this->hasMany(DetailPengadaan::class);
    }

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
    
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
