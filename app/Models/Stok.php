<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stok extends Model
{
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    } 
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
