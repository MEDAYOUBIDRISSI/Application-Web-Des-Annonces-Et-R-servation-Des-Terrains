<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Accept_pub extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {			
        return [
            'id' => $this->id,
            'date_val' => $this->date_val,
            'valide' => $this->valide,
            'publication_id' => $this->publication_id,
            'user_id' => $this->user_id,
        ];
    }
}
