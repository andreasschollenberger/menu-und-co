<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipesResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
  
        return [
            "id" => $this->id,
            "user_first_name" => $this->user["first_name"],
            "title" => $this->title,
            "image" => $this->image,
            "allergies" => $this->allergies,
            "vitamins" => $this->vitamins,
            "ingredients" => $this->ingredients,
            "instructions" => $this->instructions,
            "dish_name" => $this->dish["name"],
            "recipes_group_name" => $this->recipes_group["name"],
            "country_name" => $this->country["name"],
            
        ];
    }
}
