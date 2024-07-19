<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address,
            "email" => $this->email,
            "position" => $this->position,
            "income" => $this->income,
            "created_at" => $this->created_at->format("H:i:s d/m/Y"),
            "updated_at" => $this->updated_at->format("H:i:s d/m/Y"),
        ];
    }
}
