<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pack extends JsonResource
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
            'prix_matain' => $this->prix_matain,
            'prix_soir' => $this->prix_soir,
            'heure_debut_matin' => $this->heure_debut_matin,
            'heure_debut_soir' => $this->heure_debut_soir
        ];
    }
}
