<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DepartmentNews extends Model
{
    protected $table = 'department_news';
         protected $fillable =
        [
            'id',
            'en_name',
            'ar_name',
            
            
        ];
}
