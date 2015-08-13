<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponDetails extends Model {


    protected $table = 'coupon_details';


    protected $fillable = [

        'reward_id',
        'description',
        'name'
    ];

    /**Relationships**/
    public function reward(){


        return $this->belongsTo('App\Reward');
    }


}
