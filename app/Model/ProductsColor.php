<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsColor extends Model
{
    protected $table = 'products_color';

    protected $fillable = [
        'product_id', 'color',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
