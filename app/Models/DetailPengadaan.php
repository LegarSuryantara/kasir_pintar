<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPengadaan extends Model
{
    public function pengadaan(): BelongsTo
    {
        return $this->belongsTo(Pengadaan::class);
    }
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

}
