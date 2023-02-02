<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    // denne metoden bestemmer hvilken informasjon som skal vises
    // her kan man også endre navnet på keys uten at det har noen innvirkning på resten av programmet
    public function toArray($request)
    {
        return [
            'fornavn' => $this->first_name,
            'etternavn' => $this->last_name,
            'adresse' => $this->address,
            'land' => $this->country,
            'tlf' => $this->country_code . $this->phone_number,
            'landskode' => $this->country_code,
            'alder' => $this->age,
            'emails' => $this->emails,
            'notater' => $this->notes,
            'id' => $this->id
        ];
    }
}
