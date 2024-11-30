<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kategori extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'kategori',
        'toko_id'
    ];

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }

    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
}
