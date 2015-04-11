<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/29/15
 * Time: 8:22 PM
 */

namespace App\FridgeWorthy;


use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model{

    protected $table = "rewards";

    protected $fillable = [

        'name',
        'business_id',
        'description',
        'expiration',
        'points_required',
        'dollar_amount',
        'img'
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

    public function scopeAvailable($query){

        return $query->whereHas('coupons',function($q){

           $q->where('status','=','unredeemed');
        });
    }

    /**@TODO methods
     * -unredeemedCoupons
     * -redeemedCoupons
     *
     */


}