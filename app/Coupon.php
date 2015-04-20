<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/31/15
 * Time: 7:45 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Coupon extends Model{


    protected $table = 'coupons';


    protected $fillable = [

        'reward_id',
        'status',
        'user_id',
        'access_code'
    ];

    /**Relationships**/
    public function reward(){


        return $this->belongsTo('App\Reward');
    }
    
    /**Query Scope 
    *@TODO Verify Functionality
    **/
    
    public function scopeRedeemed($query){
        
        return $query->whereStatus('redeemed');
    }
    
    public function scopeUnredeemed($query){
        
        return $query->whereStatus('unredeemed');
    }
    
    public function scopeFlagged($query){
        
        return $query->whereStatus('flagged');
    }

    /**
     *@TODO define methods
     * -owner
     * -isRedeemed
     * -reward
     *
     */



}
