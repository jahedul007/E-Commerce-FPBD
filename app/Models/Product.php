<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'category', 'price', 'discount_price', 'quantity'];

    protected $table = 'products';

    // Define relationship with ProductImage
    // public function images()
    // {
    //     return $this->hasMany(ProductImage::class);
    // }
}

