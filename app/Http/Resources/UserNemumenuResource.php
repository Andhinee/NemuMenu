<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNemumenuResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'USER_ID' => $this->USER_ID,
            'USERNAME' => $this->USERNAME,
            'EMAIL' => $this->EMAIL,
            'PASSWORD_USER' => $this->PASSWORD_USER,
        ];
    }
}
