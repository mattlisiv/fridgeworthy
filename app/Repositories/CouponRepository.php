<?php
/**
 * Created by PhpStorm.
 * User: mlisivick
 * Date: 4/8/15
 * Time: 5:55 PM
 */

namespace App\Repositories;


use App\Coupon;
use App\Repositories\Interfaces\CouponRepositoryInterface;
use App\Custom\Helper;
use Illuminate\Support\Facades\Validator;
class CouponRepository implements CouponRepositoryInterface{


    public function all(){


        return Coupon::all();

    }

    public function find($id){

        return Coupon::findOrFail($id);
    }

    public function allWithReward(){

        return Coupon::with('reward')->get();
    }

    public function store($input)
    {
        $numberOfCoupons = $input['couponNumber'];
        $reward_id = $input['reward_id'];
        $couponType = $input['couponType'];



        for($i=0;$i<$numberOfCoupons;$i++){


            $access_code = Helper::generate_random_eight_character_access();
            $rules = array(
                'access_code'=>'unique:coupons,access_code'
            );
            $validator = Validator::make(['access_code'=>$access_code],$rules);
            if($validator->fails()){

                $i--;
            }else{
                Coupon::create([
                    'reward_id' => $reward_id,
                    'status' => 'unredeemed',
                    'access_code' => Helper::generate_random_eight_character_access()

                ]);
            }
        }
    }

    public function update($id,$input)
    {

    }

    public function destroy($id){

    }
}