<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $append = ['sorting'];
    public $sortable = ['sorting'];

     protected $fillable =
        [
            'id',
            'ar_title',
            'user_id',
            'ar_content',
            'photo',
        ];
    public function news_gallary()
    {
        return $this->hasMany('App\Model\NewsGallary', 'news_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany('App\Model\Comment', 'news_id', 'id')->orderBy('id','desc');
    }

    public function city() {

     return $this->belongsTo('App\Model\Country', 'country_id', 'id');
 }
       public function country() {

     return $this->belongsTo('App\Model\Country', 'main_country_id', 'id');
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
