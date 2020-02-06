<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'shopping_cart';
    protected $fillable =
        [

            /*    created_at  updated_at */
            'id',
            'user_id',
            'product_id',
        ];
         public function shoppings() {

        return $this->belongsTo('App\Model\Products', 'product_id', 'id');
    }
}