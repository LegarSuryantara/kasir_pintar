<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diskon extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_diskon',
        'jumlah_barang',
        'presentase',
        'tanggal_mulai',
        'tanggal_akhir',
        'toko_id'
    ];
    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
}
