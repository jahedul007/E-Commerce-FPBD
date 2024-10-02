<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewImage extends Model
{
    protected $fillable = ['product_id', 'reviewImage'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

