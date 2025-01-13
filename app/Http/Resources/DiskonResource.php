<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiskonResource extends JsonResource
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
            'nama_diskon' => $this->nama_diskon,
            'jumlah_barang' => $this->jumlah_barang,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
            'toko_id' => $this->toko_id

        ];

        $table->date('tanggal_mulai');
        $table->date('tanggal_akhir');
        $table->timestamps();
        $table->foreignId('toko_id')->constrained();
    }
}
