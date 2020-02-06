<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsSize extends Model
{
    protected $table = 'products_size';

    protected $fillable = [
        'product_id', 'size',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
