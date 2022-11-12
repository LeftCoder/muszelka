<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'src' => $this->src,
            'thumbnail' => $this->thumbnail,
            'width' => $this->width,
            'height' => $this->height,
            'alt' => $this->alt,
        ];
    }
}
