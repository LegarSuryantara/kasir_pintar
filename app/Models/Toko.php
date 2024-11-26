<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Toko extends Model
{
    public function kasir(): HasMany
    {
        return $this->hasMany(Kasir::class, 'id_toko');
    }
    public function kategori(): HasMany
    {
        return $this->hasMany(Kategori::class);
    }
}
