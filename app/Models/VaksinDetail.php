<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaksinDetail extends Model
{
    use HasFactory;

    protected $table = 'vaksin_detail';

    protected $fillable = [
        'tanggal_ovk',
        'jenis_ovk',
        'jumlah_ayam',
        'next_ovk',
        'biaya_ovk',
        'total_biaya',

    ];
}