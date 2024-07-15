<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Allergy;
use App\Models\Vitamin;

class Recipes extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'image', 'nutrition', 'allergies', 'vitamins', 'ingredients', 'instructions', 'dish_id', 'recipes_group_id', 'country_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dish()
    {
        return $this->belongsTo(Dishes::class, 'dish_id');
    }

   public function allergies()
   {
        return $this->hasMany(Allergy::class, 'id');
   }

   public function vitamins()
   {
        return $this->hasMany(Vitamin::class, 'id');
   }



    public function recipes_group()
    {
        return $this->belongsTo(RecipesGroups::class, 'recipes_group_id');
    }

    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

}
