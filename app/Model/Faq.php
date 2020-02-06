<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;


class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable =
        [
            'id',
            'en_question',
            'ar_question',
            'en_answer',
            'ar_answer',
        ];
}