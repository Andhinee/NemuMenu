<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ULASAN';
    protected $primaryKey = 'ULASAN_ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ULASAN_ID',
        'USER_ID',
        'RESTO_ID',
        'ULASAN_TEXT',
        'RATING'
    ];

    // Relationship with Restaurant
    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'RESTO_ID', 'RESTO_ID');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(UserNemumenu::class, 'USER_ID', 'USER_ID');
    }
}