<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'phone' => $this->phone,
            'start' => $this->start,
            'end' => $this->end,
            'days' => $this->daysOfStay(),
            'adults' => $this->adults,
            'children' => $this->children,
            'animals' => $this->animals,
            'confirmed' => $this->confirmed,
            'apartment_id' => $this->apartment_id,
        ];
    }
}
