<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diskon extends Model
{
    use HasFactory;
    protected $fillable = [
        'toko_id',
        'jumlah_barang',
        'nama_diskon',
        'presentase',
        'tanggal_mulai',
        'tanggal_akhir'
    ];
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
}
