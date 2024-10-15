<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{

    use HasFactory;

    use Notifiable;

    // user relation
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'product_title',
        'product_image',
        'price',
        'quantity',
        'payment_status',
        'delivery_status',
        'product_id',
        'thana',
        'district',
        'product_code'

    ];

    public function products(){
        return $this->belongsTo(Product::class, 'product_id');
    }

}
