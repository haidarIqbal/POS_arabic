<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quotation extends Model
{
    protected $fillable = [
      'order_id', 'product_id', 'quantity', 'unitprice', 'payment_t','discount', 'amount',
    ];
}
