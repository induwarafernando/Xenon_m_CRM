<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'payment_method',
        'first_name',
        'last_name',
        'address',
        'city',
        'postal_code',
        'phone',
        'total',
        'status',
    ];

    // Define the relationship with Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity', 'price');
    }

    protected $table = 'orders';



}
