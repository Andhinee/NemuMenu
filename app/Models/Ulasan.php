<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ULASAN';
    protected $primaryKey = 'ULASAN_ID';
    public $timestamps = false;

    protected $fillable = [
        'USER_ID',
        'RESTORAN_ID',
        'ISI_ULASAN',
        'RATING',
    ];

    public function user()
    {
        return $this->belongsTo(UserNemumenu::class, 'USER_ID', 'USER_ID');
    }

    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'RESTORAN_ID', 'RESTORAN_ID');
    }
}
