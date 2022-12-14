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
            'number' => $this->number,
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
            'status' => $this->status->label(),
            'apartment' => [
                'id' => $this->apartment->id,
                'name' => $this->apartment->name,
            ],
        ];
    }
}
