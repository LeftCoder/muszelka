<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
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
            'description' => $this->description,
            'price' => $this->price,
            'max' => $this->max,
            'occupied' => $this->occupied,
            'features' => FeatureResource::collection($this->whenLoaded('features')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'last_reservation' => new ReservationResource($this->whenLoaded('lastReservation')),
        ];
    }
}
