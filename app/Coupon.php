<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/31/15
 * Time: 7:45 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class Coupon extends Model{


    protected $table = 'coupons';


    protected $fillable = [

        'reward_id',
        'status',
        'user_id',
        'access_code',
        'coupon_type'
    ];


    public function delete(){

        if($this->image->first()) {
            $image = $this->image()->first();

            $image_path = substr($image->file_path, 1);
            unlink($image_path);

        }

        $this->image()->delete();

        return parent::delete();

    }

    /**Relationships**/
    public function reward(){


        return $this->belongsTo('App\Reward');
    }

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function image(){

        return $this->hasMany('App\CouponImage');
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


    public function getImage(){

        if($this->image->first()){
            $file_path = $this->image->first()->file_path;
            return $file_path;
        }else{
            return null;
        }

    }

}
