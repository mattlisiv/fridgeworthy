<?php namespace App\Http\Controllers\Business;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CouponRepository;
use App\Repositories\Interfaces\CouponRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller {




    public function __construct(CouponRepositoryInterface $couponRepositoryInterface){

        $this->couponRepository = $couponRepositoryInterface;

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function submitAccessCode(Requests\SubmitAccessCodeRequest $request)
    {
        $user = Auth::user();
        $couponReturned = $this->couponRepository->all()->first()->where('access_code','=',$request['access_code'])->where('reward_id','=',$request['reward_id'])->get();
        if(!is_null($couponReturned) && count($couponReturned)){

            $coupon = $couponReturned[0];
            if($coupon->status=='redeemed'){
                return view('business.SubmitAccessCode.redeemed');
            }else{
                $coupon->status = 'redeemed';
                $coupon->save();
                return view('business.SubmitAccessCode.updated');            }
        }else{

            return view('business.SubmitAccessCode.notfound');
        }

    }



}
