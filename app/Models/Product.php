<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_name', 'company_website', 'zip_code', 'city', 'name', 'description', 'image', 'url', 'address', 'partner_id'];

    

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    
}
