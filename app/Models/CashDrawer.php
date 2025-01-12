<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CashDrawer extends Model
{
    use HasFactory;
    protected $fillable = [
        'toko_id',
        'kasir_id',
        'shifts_id',
        'pemasukan',
        'pengeluaran'
    ];
}
