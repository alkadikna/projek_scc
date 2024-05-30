<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email',
        'payment_method',
        'items',
        'total_price',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
