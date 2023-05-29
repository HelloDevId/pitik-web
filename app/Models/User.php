<?php

namespace App\Models;

use App\Models\SampleJual;
use App\Models\LevelDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'user_detail';

    protected $fillable = [
        'email',
        'password',
        'user_fullname',
        'id_level',
    ];

    public function leveldetail()
    {
        return $this->belongsTo(LevelDetail::class, 'id_level', 'id');
    }

    public function samplejual()
    {
        return $this->hasMany(SampleJual::class, 'id_user', 'id');
    }

}