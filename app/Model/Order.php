<?php

namespace App\Model;
//use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable =
        [
            'id',
            'user_id',
            'country_id',
            'name',
            'address',
            'email',
            'phone',
            'price',
            'code',
            'seen',
        ];
    public function user()
{
    return $this->belongsTo('App\User','user_id','id' );
}
    public function country()
{
    return $this->belongsTo('App\Model\Country','country_id','id' );
}

public function item()
{
return $this->hasOne('App\Model\OrderItem','order_id' );
}
}
