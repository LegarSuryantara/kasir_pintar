<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pajak extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'presentase',
        'toko_id'
    ];

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
}
