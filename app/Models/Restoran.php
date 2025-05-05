<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    protected $table = 'RESTORAN';
    protected $primaryKey = 'RESTORAN_ID';
    public $timestamps = false;

    protected $fillable = [
        'NAMA_RESTORAN',
        'LOKASI',
        'DESKRIPSI',
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'RESTORAN_ID', 'RESTORAN_ID');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'RESTORAN_ID', 'RESTORAN_ID');
    }

    public function favorit()
    {
        return $this->hasMany(Favorit::class, 'RESTORAN_ID', 'RESTORAN_ID');
    }
}
