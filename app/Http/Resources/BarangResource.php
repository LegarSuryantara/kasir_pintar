<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     * 
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'nama_barang' => $this->nama_barang,
            'image_barang' => $this->image_barang ? asset('storage/barang_images/' . $this->image_barang) : null,
            'kategori' => $this->kategori->kategori,
            'toko' => $this->toko->nama_toko,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
