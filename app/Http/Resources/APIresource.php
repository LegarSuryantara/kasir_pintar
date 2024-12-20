<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class APIresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'presentase' => $this->presentase,
            'created_at' => $this->created_at,
            'update_at' => $this->update_at,
            'toko_id' => $this->toko_id,
        ];
    }
}
