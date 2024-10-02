<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productAnotherImage extends Model
{
    protected $fillable = ['product_id', 'detailsImage'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}


