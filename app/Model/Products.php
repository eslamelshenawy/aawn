<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
   protected $table = 'products';
   protected $append = ['new','sorting'];
   public $sortable = ['sorting'];
    protected $fillable =
        [
            'id',
            'en_title',
            'ar_title',
            'price',
            'photo',
            'user_id',
            'dep_id',
            'main_dep_id',
            'en_content',
            'ar_content',
            'size',
            'color',
            'type',
            'address',
            'country_id',
            'main_country_id',
            'user_type',
            'stock'
        ];

       public function product_vendor()
    {

        return $this->belongsTo('App\User', 'user_id', 'id');

    }
         public function product_admin()
    {

        return $this->belongsTo('App\Admin', 'user_id', 'id');

    }

   public function products_gallary()
    {
        return $this->hasMany('App\Model\ProductsGallary', 'product_id', 'id');
    }

    public function item()
     {
         return $this->hasMany('App\Model\OrderItem', 'product_id', 'id');
     }

       public function product_dep() {

        return $this->belongsTo('App\Model\DepartmentProducts', 'dep_id', 'id');
    }
          public function product_dep_main() {

        return $this->belongsTo('App\Model\DepartmentProducts', 'main_dep_id', 'id');
    }

    public function product_country() {

     return $this->belongsTo('App\Model\Country', 'country_id', 'id');
 }
       public function product_country_main() {

     return $this->belongsTo('App\Model\Country', 'main_country_id', 'id');
 }


    public function getNewAttribute()
    {
        if(!empty($this->attributes['created_at'])){
            $today = time(); // or your date as well
            $created_at = strtotime($this->attributes['created_at']);
            $datediff = $today - $created_at;
            $diff =  round($datediff / (60 * 60 * 24));
            if($diff <= "14"){
                return true;
            }else{
                return false;
            }
       }else{
           return false;
       }
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
