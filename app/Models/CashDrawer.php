<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class CashDrawer extends Model
{
    use HasFactory;
    protected $table = 'cash_drawers';
    protected $fillable = [
        'toko_id',
        'kasir_id',
        'shift_id',
        'uang_sebelum',
        'uang_sesudah'
    ];

    public function toko(): BelongsTo
    {
        return $this->belongsTo(Toko::class);
    }
    public function kasir(): BelongsTo
    {
        return $this->belongsTo(Kasir::class);
    }
    
    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }

}
