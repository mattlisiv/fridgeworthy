<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CouponRepositoryInterface;
use App\Repositories\Interfaces\RewardRepositoryInterface;
use App\Reward;
use Barryvdh\DomPDF\PDF;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PublicRewardController extends Controller {

    public function __construct(RewardRepositoryInterface $rewardRepositoryInterface,CouponRepositoryInterface $couponRepositoryInterface){

        $this->rewardRepository = $rewardRepositoryInterface;
        $this->couponRepository = $couponRepositoryInterface;
    }


    public function index(){

        $user = Auth::user();
        $rewards = Reward::available()->get();
        return view("public.rewards.index",compact('rewards','user'));

    }

    public function show($id){

        $user = Auth::user();
        $reward = Reward::findOrFail($id);
        return view("public.rewards.show",compact('reward','user'));

    }

    public function viewMyRedeemedRewards(){

        $user = Auth::user();
        $coupons = $user->coupons()->redeemed()->get();
        return view("rewards.redeemedrewards",compact('user','coupons'));

    }

    public function viewMyUnredeemedRewards(){

        $user = Auth::user();
        $coupons = $user->coupons()->unredeemed()->get();
        return view("rewards.unredeemedrewards",compact('user','coupons'));

    }

    public function redeemReward(Requests\RedeemRewardRequest $request){

        $user = Auth::user();
        $reward = $this->rewardRepository->find($request['reward_id']);
        $coupons = $reward->coupons()->where('status','=','unclaimed')->whereNull('user_id')->get();
        if(!is_null($coupons) && count($coupons)){
            if($reward->points_required <=$user->points) {
                $coupon = $coupons[0];
                $coupon->user_id = $user->id;
                $coupon->status = 'unredeemed';
                $coupon->save();
                $user->points-= $reward->points_required;
                $user->save();
                return redirect()->action('PublicRewardController@viewMyUnredeemedRewards');

            }else{
                throw new Exception('Error in retrieving ');
            }
        }else{
            throw new Exception('Oh no, something went wrong');

        }
    }

    public function viewCoupon($id){

        $coupon = $this->couponRepository->find($id);
        $reward = $coupon->reward;
        $user = Auth::user();
        if($coupon->user_id!=$user->id){
            return new Response('Forbidden',403);

        }else{
            if($coupon->status == 'redeemed'){

               return redirect()->back();
            }else if($coupon->status == 'unredeemed'){

                return view('public.coupons.show',compact('coupon','reward','user'));
            }else{
                return new Response('Error in accessing coupon',404);
            }

        }


    }


}
