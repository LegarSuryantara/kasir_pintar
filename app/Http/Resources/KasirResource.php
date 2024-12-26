<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KasirResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'nama_kasir'=>$this->nama_kasir,
            'no_hp'=>$this->no_hp,
            'alamat'=>$this->alamat,
            'toko_id'=>$this->toko_id
        ];
    }
}
