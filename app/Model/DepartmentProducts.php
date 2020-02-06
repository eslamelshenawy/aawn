<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartmentProducts extends Model
{
    use SoftDeletes;
    protected $table = 'department_products';
       protected $fillable =
        [
            'id',
            'ar_name',
            'image',
            'parent',
        ];
    public function products_dep()
    {
        return $this->hasMany('App\Model\Products', 'dep_id', 'id');
    }

    public function department()
    {
        return $this->hasMany('App\Model\DepartmentProducts', 'parent', 'id');
    }

}
