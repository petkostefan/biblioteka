<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->resource->id,
            'naziv'=>$this->resource->naziv,
            'opis'=>$this->resource->opis,
            'ocena'=>$this->resource->ocena,
            'user_id' => new UserResource($this->resource->user_id),
            'izdavac_id' => new PublisherResource($this->resource->izdavac_id),
            'autor_id' => new AuthorResource($this->resource->autor_id)
        ];
    }
}
