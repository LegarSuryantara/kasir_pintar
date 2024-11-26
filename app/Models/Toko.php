<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Toko extends Model
{
    public function kasir(): HasMany
    {
        return $this->hasMany(Kasir::class);
    }
    public function kategori(): HasMany
    {
        return $this->hasMany(Kategori::class);
    }
    public function pajak(): HasMany
    {
        return $this->hasMany(Pajak::class);
    }
    public function diskon(): HasMany
    {
        return $this->hasMany(Diskon::class);
    }
}
