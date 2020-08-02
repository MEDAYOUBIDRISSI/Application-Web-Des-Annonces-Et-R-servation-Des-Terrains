<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Terrain extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'categorie_id' => $this->categorie_id,
            'type_id' => $this->type_id,
            'pack_id' => $this->pack_id,
            'nom' => $this->nom,
            'longeur' => $this->longeur,
            'largeur' => $this->largeur,
            'created_at'=> $this->created_at,
            'url'=> $this->url
        ];
        
    }
}
