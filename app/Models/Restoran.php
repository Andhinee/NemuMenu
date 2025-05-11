<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;

    protected $table = 'RESTORAN';
    protected $primaryKey = 'RESTO_ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'RESTO_ID',
        'NAMA_RESTO',
        'IMAGE',
        'LOKASI',
        'NO_TELP',
        'RANGE_HARGA',
        'WAKTU_BUKA'
    ];

    // Relationship with Menu
    public function menu()
    {
        return $this->hasOne(Menu::class, 'RESTO_ID', 'RESTO_ID');
    }

    // Relationship with User favorites
    public function favoritedBy()
    {
        return $this->belongsToMany(UserNemumenu::class, 'FAVORIT', 'RESTO_ID', 'USER_ID')
                    ->withPivot('FAVORIT_ID');
    }

    // Relationship with Reviews
    public function reviews()
    {
        return $this->hasMany(Ulasan::class, 'RESTO_ID', 'RESTO_ID');
    }
}