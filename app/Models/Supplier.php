<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_supplier',
        'no_hp',
        'alamat',
    ];
    public function pengadaan(): HasMany
    {
        return $this->hasMany(Pengadaan::class);
    }
}
