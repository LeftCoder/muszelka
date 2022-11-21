<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LastReservationResource extends JsonResource
{
    public $collects = Reservation::class;

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
        ];
    }
}
