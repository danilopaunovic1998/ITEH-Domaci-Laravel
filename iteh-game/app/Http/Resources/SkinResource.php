<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'skin';
    public function toArray($request)
    {
        return[
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'color'=>$this->resource->color,
            'champion'=> new ChampionResource($this->resource->champion),
        ];
    }
}
