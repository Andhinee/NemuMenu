<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    protected $table = 'FAVORIT';
    protected $primaryKey = 'FAVORIT_ID';
    public $timestamps = false;

    protected $fillable = [
        'USER_ID',
        'RESTORAN_ID',
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
