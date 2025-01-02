<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kasir extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_kasir',
        'no_hp',
        'alamat',
        'toko_id'
    ];
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
    public function shift(): HasMany
    {
        return $this->hasMany(Shift::class);
    }
}
