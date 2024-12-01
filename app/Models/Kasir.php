<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
