<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengadaan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'toko_id',
        'supplier_id',
        'tanggal_pengadaan'
    ];

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
