<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

    protected $table = 'agents';
    protected $append = ['sorting'];

    protected $fillable = [
        'id','name', 'email','location','address','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function agent_country()
    {
        return $this->belongsTo('App\Model\Country','country_id','id' );
    }
    public function agent_main_country()
    {
        return $this->belongsTo('App\Model\Country','main_country_id','id' );
    }


        public function getSortingAttribute()
        {
            // If User Login
            if(auth()->check()){
                if(auth()->user()->main_country_id && auth()->user()->country_id){
                    if(!empty($this->attributes['country_id'])){
                        if($this->attributes['country_id'] == auth()->user()->country_id){ // If Same  City
                            return 1;
                        }elseif($this->attributes['main_country_id'] == auth()->user()->main_country_id){ // If Same  Country
                            return 2;
                        }else{
                            return 3;
                        }
                    }else{
                        return 3;
                    }
               }else{
                   return 3;
               }
            }else{
                return 3;
            }
        }
}
