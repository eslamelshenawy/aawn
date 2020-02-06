<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlockUser extends Model
{
    protected $table = 'block_users';
    protected $fillable =
        [

            'ip',
        ];

}
