<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class UserNemumenu extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'USER_NEMUMENU';
    protected $primaryKey = 'USER_ID';
    public $incrementing = false; // jika ID seperti AD001, US001
    public $timestamps = false;

    protected $fillable = [
        'USER_ID',
        'USERNAME',
        'EMAIL',
        'PASSWORD_USER',
    ];

    protected $hidden = ['PASSWORD_USER'];  // Agar password tidak muncul di response

    public function getAuthPassword()
    {
        return $this->PASSWORD_USER;  // Menyatakan kolom mana yang digunakan sebagai password
    }

    // Fungsi untuk meng-hash password sebelum disimpan
    public function setPasswordUserAttribute($value)
    {
        $this->attributes['PASSWORD_USER'] = Hash::make($value);
    }
}
