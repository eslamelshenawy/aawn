<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsGallary extends Model
{
    protected $table = 'news_gallary';

    protected $fillable = [
        'news_id', 'media',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

}
