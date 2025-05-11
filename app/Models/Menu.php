<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'MENU';
    protected $primaryKey = 'MENU_ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'MENU_ID',
        'RESTO_ID',
        'IMG_MENU_1',
        'IMG_MENU_2',
        'IMG_MENU_3',
        'IMG_MENU_4',
        'IMG_MENU_5'
    ];

    // Relationship with Restaurant
    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'RESTO_ID', 'RESTO_ID');
    }
}