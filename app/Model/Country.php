<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $table = 'countries';
    protected $fillable =
        [
            'country_name_ar',
            'country_name_en',
            'mob',
            'code',
            'logo',
            'parent',
        ];
    public function agentss()
    {
        return $this->hasMany('App\Model\Agent', 'country_id', 'id');
    }

    public function city()
    {
        return $this->hasMany('App\Model\Country', 'parent', 'id');
    }
}
