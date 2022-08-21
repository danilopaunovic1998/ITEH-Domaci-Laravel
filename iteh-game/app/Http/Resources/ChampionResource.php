<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChampionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'champion';
     public function toArray($request)
    {

        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'attack'=>$this->resource->attack,
            'defence'=>$this->resource->defence,
            //'skins'=> new SkinCollection($this->resource->skins),
        ];
    }
}
