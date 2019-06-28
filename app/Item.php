<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name',
		'cost_price',
		'market_price',
		'discount',
		'sell_price',
		'quantity',
		'image',
		'purchase_date',
		'purchase_from',
		'description',
    ];
}
