<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kategori extends Model
{
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
}
