<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toko extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_toko',
        'image_toko',
        'no_hp',
        'alamat',
        'user_id',
    ];

    public function kasir(): HasMany
    {
        return $this->hasMany(Kasir::class);
    }
    public function kategori(): HasMany
    {
        return $this->hasMany(Kategori::class);
    }
    public function shift(): HasMany
    {
        return $this->hasMany(Shift::class);
    }
    public function pajak(): HasMany
    {
        return $this->hasMany(Pajak::class);
    }
    public function diskon(): HasMany
    {
        return $this->hasMany(Diskon::class);
    }
    public function stok(): HasMany
    {
        return $this->hasMany(Stok::class);
    }
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
    public function pengadaan(): HasMany
    {
        return $this->hasMany(Pengadaan::class);
    }
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function cashdrawer(): HasMany
    {
        return $this->hasMany(cashdrawer::class);
    }
}
