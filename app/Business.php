<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Business extends Model {

    protected $table = 'businesses';

    protected $fillable = [

        'name',
        'website',
        'location'
    ];

    /**Relationships **/
    public function rewards(){

        return $this->hasMany('App\Reward');
    }
    
    public function coupons(){
        
        return $this->hasManyThrough('App\Coupon','App\Reward');
    }

    public function customers(){


        return User::select('users.*')
            ->leftJoin('coupons','users.id','=','coupons.user_id')
            ->leftJoin('rewards','coupons.reward_id','=','rewards.id')
            ->leftJoin('businesses','rewards.business_id','=','businesses.id')
            ->where('businesses.id','=',$this->id)->distinct();

    }



}
