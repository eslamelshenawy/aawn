<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products;

class Favourite extends Model
{
    protected $fillable =
        [
            'id',
            'product_id',
            'user_id',
            'type'
        ];

        public function product()
     {
         return $this->belongsTo(Products::class);
     }
}
