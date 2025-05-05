<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'MENU';
    protected $primaryKey = 'MENU_ID';
    public $timestamps = false;

    protected $fillable = [
        'NAMA_MENU',
        'HARGA',
        'RESTORAN_ID',
    ];

    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'RESTORAN_ID', 'RESTORAN_ID');
    }
}
