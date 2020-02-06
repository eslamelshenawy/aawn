<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductsGallary extends Model
{
    protected $table = 'products_gallary';

    protected $fillable = [
        'product_id', 'media',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
