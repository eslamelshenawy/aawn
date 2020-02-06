<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $fillable =
        [
            'id',
            'product_id',
            'order_id',
            'vendor_id',
            'vendor_type',
            'item_price',
            'status',
            'user_id'
        ];
    public function shoppings() {

        return $this->belongsTo('App\Model\ProductsGallary', 'product_id', 'id');
    }
    public function shopping() {

        return $this->belongsTo('App\Model\Products', 'product_id', 'id');
    }
    public function order_dd() {

        return $this->belongsTo('App\Model\Order', 'order_id', 'id');
    }
}
