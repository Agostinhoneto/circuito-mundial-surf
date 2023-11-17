<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotasResource extends JsonResource
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
            'onda' => $this->onda,
            'notaParcial1' => $this->notaParcial1,
            'notaParcial2' => $this->notaParcial2,
            'notaParcial3' => $this->notaParcial3,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
