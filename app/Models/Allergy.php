<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'url'];
    public function recipes()
    {
        return $this->belongsToMany(Recipes::class );
    }
}
