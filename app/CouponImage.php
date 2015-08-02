<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponImage extends Model {

    protected $table = 'coupon_images';

    protected $fillable = [

        'coupon_id',
        'file_path'
    ];

    /**Relationships **/
    public function coupon(){

        return $this->belongsTo('App\Coupon');
    }


}
