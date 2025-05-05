<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNemumenu extends Model
{
    protected $table = 'USER_NEMUMENU';
    protected $primaryKey = 'USER_ID';
    public $timestamps = false;

    protected $fillable = [
        'USERNAME',
        'EMAIL',
        'PASSWORD_USER',
    ];

    public function favorit()
    {
        return $this->hasMany(Favorit::class, 'USER_ID', 'USER_ID');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'USER_ID', 'USER_ID');
    }
}
