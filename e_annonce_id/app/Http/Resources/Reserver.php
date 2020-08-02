<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Reserver extends JsonResource
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
            'user_id' => $this->user_id,
            'date_reservation' => $this->date_reservation,
            'terrain_id' => $this->terrain_id,
            'heure_id' => $this->heure_id,
            'created_at'=>$this->created_at
        ];
    }
}
