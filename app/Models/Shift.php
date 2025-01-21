<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shift extends Model
{
    protected $fillable = ['toko_id', 'kasir_id', 'tanggal', 'waktu_masuk', 'waktu_keluar'];

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
    public function kasir(): BelongsTo
    {
        return $this->belongsTo(Kasir::class);
    }
    public function cashDrawer(): HasMany
    {
        return $this->hasMany(CashDrawer::class);
    }
}