<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitamin extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
    public function recipes()
    {
        return $this->belongsToMany(Recipes::class, 'vitamins_recipes');
    }
}
