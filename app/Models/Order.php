<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'first_name', 'last_name', 'address', 'apartment', 'city', 'postal_code', 'phone', 'payment_method', 'total'
    ];
}
