<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{


    protected $fillable = [
        'user_id','department_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function deprtment()
    {
        return $this->belongsTo('App\Model\DepartmentProducts','department_id','id' );
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id' );
    }

}
