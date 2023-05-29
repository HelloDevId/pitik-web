<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SampleJual extends Model
{
    use HasFactory;

    protected $table = 'sample_jual';

    protected $fillable = [
        'id_user',
        'jumlah_jual',
    ];

    public function userdetail()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
