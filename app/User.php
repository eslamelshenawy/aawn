<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Model\Order;
use App\Model\BlockUser;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use SoftDeletes;
    protected $table = 'users';
    protected $append = ['block'];
    protected $fillable = [
      'id',  'name', 'email','password','status','provider','country_id','address','main_country_id','phone','active','ip','company'
    ];

    protected $hidden = [
        'password', 'remember_token','api_token',
    ];
    public function user_country()
    {
        return $this->belongsTo('App\Model\Country','country_id','id' );
    }
    public function user_main_country()
    {
        return $this->belongsTo('App\Model\Country','main_country_id','id' );
    }
    public function user_ticket()
    {
        return $this->hasMany('App\Model\SupportTickets', 'user_id', 'id');
    }
    public function user_orders()
    {
        return $this->hasMany('App\Model\Order', 'user_id', 'id');
    }
    public function user_products()
    {
        return $this->hasMany('App\Model\Products', 'user_id', 'id');
    }

    public function getBlockAttribute()
    {
        $block = BlockUser::where('ip',$this->attributes['ip'])->first();
        if($block){
            return true;
        }else{
            return false;
        }
    }

}
