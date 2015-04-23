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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Exception;

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

        if($couponType=='managed'){

            for($i=0;$i<$numberOfCoupons;$i++){


                $access_code = Helper::generate_random_eight_character_access();
                $rules = array(
                    'access_code'=>'unique:coupons,access_code,NULL,id,reward_id,'.$reward_id
                );
                $validator = Validator::make(['access_code'=>$access_code],$rules);
                if($validator->fails()){

                    $i--;
                }else{
                    Coupon::create([
                        'reward_id' => $reward_id,
                        'status' => 'unredeemed',
                        'access_code' => $access_code

                    ]);
                }
            }

        }else if($couponType=='auto-managed'){

                $coupon_codes = $input['coupon_codes'];
                foreach($coupon_codes as $key=>$coupon_code){

                    Coupon::create(['reward_id'=>$reward_id,'status'=>'unclaimed','access_code'=>$coupon_code]);
                }

        }else{

            throw new \Exception("Error in retrieving information");
        }

    }

    public function update($id,$input)
    {

    }

    public function destroy($id){

    }

    public function filterCouponsByUnclaimedStatus(Collection $coupons){

        $coupons = $coupons->filter(function($coupon){

            if($coupon->status =='unclaimed'){
                return true;
            }

        });

        return $coupons;
    }
    public function filterCouponsByUnredeemedStatus(Collection $coupons){

        $coupons = $coupons->filter(function($coupon){

            if($coupon->status =='unredeemed'){
                return true;
            }

        });

        return $coupons;
    }
    public function filterCouponsByRedeemedStatus(Collection $coupons){

        $coupons = $coupons->filter(function($coupon){

            if($coupon->status =='redeemed'){
                return true;
            }

        });

        return $coupons;
    }

    public function filterCouponsByFlaggedStatus(Collection $coupons){

        $coupons = $coupons->filter(function($coupon){

            if($coupon->status =='flagged'){
                return true;
            }

        });

        return $coupons;
    }
}