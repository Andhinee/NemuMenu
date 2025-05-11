<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserNemumenuResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->USER_ID,
            'username' => $this->USERNAME,
            'email' => $this->EMAIL,
            'password' => $this->PASSWORD_USER, // Sebaiknya jangan menampilkan password secara langsung
        ];
    }
}
