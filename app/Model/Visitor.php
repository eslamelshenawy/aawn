<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';
    protected $fillable =
        [

            'ip',
            'created',
        ];

}