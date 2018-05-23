<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DishTypes as DishTypesResource;

class Dishes extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'dish' => $this->dish,
            'dish_img' => $this->dish_img,
            'description' => $this->description,
            'ingredients' => $this->ingredients,
            'procedure' => $this->procedure,
            'dish_type' => $this->dish_types->dish_type,
            'contributed_user' => $this->user->name
            
        ];
    }
}
