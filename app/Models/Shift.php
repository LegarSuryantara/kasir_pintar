<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shift extends Model
{
    protected $fillable = [
        'kasir_id',
        'toko_id',
        'waktu_masuk',
        'waktu_keluar'
    ];

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
    public function kasir(): BelongsTo
    {
        return $this->belongsTo(Kasir::class);
    }
}
