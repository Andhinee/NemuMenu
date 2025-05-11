<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    protected $table = 'FAVORIT';
    protected $primaryKey = 'FAVORIT_ID';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'FAVORIT_ID',
        'USER_ID',
        'RESTO_ID'
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