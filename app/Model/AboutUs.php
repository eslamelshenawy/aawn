<?php


namespace App\Model;
use Illuminate\Database\Eloquent\Model;


class AboutUs extends Model
{
    protected $table = 'aboutus';
    protected $fillable =
        [
            'id',
            'description',
            'image',
        ];
}