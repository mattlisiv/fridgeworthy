<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/29/15
 * Time: 8:22 PM
 */

namespace app;


use Illuminate\Database\Eloquent\Model;

class Reward extends Model{

    protected $table = "rewards";

    protected $fillable = [

        'name',
        'business_id',
        'description',
        'expiration',
        'points_required',
        'dollar_amount'
    ];

    protected $dates = [
        'expiration'
    ];

    public function business(){


        return $this->belongsTo('App\Business');
    }

    public function coupons(){

        return $this->hasMany('App\Coupon');
    }

    /**@TODO methods
     * -unredeemedCoupons
     * -redeemedCoupons
     *
     */


}