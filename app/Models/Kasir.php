<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kasir extends Model
{
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
}
