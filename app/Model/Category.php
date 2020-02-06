<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable =
        [

            /* 	 	created_at 	updated_at */
            'category_ar_name',
            'category_en_name',
            'logo',
            'parent',
        ];

}
