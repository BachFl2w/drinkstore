<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderDetailTopings()
    {
        return $this->hasMany(OrderDetailToping::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
