<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kasir extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama_kasir',
        'no_hp',
        'alamat',
        'toko_id',
    ];

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }

    public function shift(): HasMany
    {
        return $this->hasMany(Shift::class);
    }

    public function cashdrawer(): HasMany
    {
        return $this->hasMany(Cashdrawer::class);
    }
}
