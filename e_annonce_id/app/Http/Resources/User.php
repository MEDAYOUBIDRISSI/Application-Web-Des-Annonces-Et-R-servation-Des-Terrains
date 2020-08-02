<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'brand_name' => $this->brand_name,
            'email' => $this->email,
            'password' => $this->password,
            'dateNaissance' => $this->dateNaissance,
            'tel' => $this->tel,
            'adresse' => $this->adresse,
            'laltitude' => $this->laltitude,
            'longitude' => $this->longitude,
            'ville' => $this->ville,
            'coverture' => $this->coverture,
            'url' => $this->url,
            'type' => $this->type
        ];
    }
}
