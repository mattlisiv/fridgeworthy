<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 3/31/15
 * Time: 7:45 PM
 */

namespace app;

use Illuminate\Database\Eloquent\Model;


class Coupon extends Model{


    protected $table = 'coupons';


    protected $fillable = [

        'reward_id',
        'status',
        'user_id',
        'access_code'
    ];
}