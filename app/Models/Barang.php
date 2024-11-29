<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
