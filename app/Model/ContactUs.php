<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contactus';
    protected $fillable =
        [

            /* 	 	created_at 	updated_at */
            'id',
            'name',
            'email',
            'subject',
            'message',
        ];

}