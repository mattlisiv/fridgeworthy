<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Business extends Model {

    protected $table = 'businesses';

    protected $fillable = [

        'name',
        'website',
    ];

    /**Relationships **/
    public function rewards(){

        return $this->hasMany('App\Reward');
    }
    
    public function coupons(){
        
        return $this->hasManyThrough('App\Coupon','App\Reward');
    }



}
