<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Publication extends JsonResource
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
            'titre' => $this->titre,
            'pub' => $this->pub,
            'user_id' => $this->user_id,
            'url' => $this->url,
            'date_creation' => $this->date_creation,
            'created_at'=>$this->created_at
        ];
    }
}
