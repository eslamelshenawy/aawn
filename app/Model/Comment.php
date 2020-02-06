<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
     protected $fillable =
        [
            'id',
            'user_id',
            'comment',
            'news_id'
        ];

        public function user()
        {
            return $this->belongsTo('App\User', 'user_id', 'id');
        }
}
