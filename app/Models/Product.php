<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'company_name', 'company_website', 'zip_code', 'city', 'name', 'description', 'image', 'url', 'address', 'partner_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }

    public function company_name()
    {
        return $this->belongsTo(Partner::class, 'company_name');
    }

    public function company_website()
    {
        return $this->belongsTo(Partner::class, 'company_website');
    }

    public function zip_code()
    {
        return $this->belongsTo(Partner::class, 'zip_code');
    }

    public function city()
    {
        return $this->belongsTo(Partner::class, 'city');
    }

    public function name()
    {
        return $this->belongsTo(Product::class, 'name');
    }

    public function description()
    {
        return $this->belongsTo(Product::class, 'description');
    }

    public function image()
    {
        return $this->belongsTo(Product::class, 'image');
    }

    public function url()
    {
        return $this->belongsTo(Product::class, 'url');
    }

    public function address()
    {
        return $this->belongsTo(Product::class, 'address');
    }

    public function partner_id()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }
}
