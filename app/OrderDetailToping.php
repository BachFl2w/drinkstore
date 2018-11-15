<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetailToping extends Model
{
    protected $table = 'order_detail_toping';

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function toping()
    {
        return $this->belongsTo(Topping::class);
    }
}
