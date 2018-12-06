<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $table = 'toppings';

    protected $fillable = [
        'id',
        'name',
        'price',
        'quantity',
    ];

    public function orderDetailTopping()
    {
        return $this->belongsToMany(OrderDetail::class);
    }
}
