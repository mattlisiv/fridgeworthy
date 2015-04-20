<?php namespace App\Http\Controllers;

use App\Coupon;
use App\Custom\Helper;
use App\Http\Requests;
use App\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pageTitle = "Coupon Manager";
        $coupons = Coupon::with('reward')->get();

		return view('coupons.index',compact('pageTitle','coupons'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New Coupon";
        $rewards = Reward::all();
        return view('coupons.create',compact('pageTitle','rewards'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\CouponRequest $request
     * @return Response
     */
	public function store(Requests\CouponRequest $request)
	{

        $numberOfCoupons = $request['couponNumber'];
        $reward_id = $request['reward_id'];
        $couponType = $request['couponType'];

        if($couponType=="managed"){

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

            return redirect()->action('CouponController@index');

        }else{

            return "Not Storing";
        }

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $coupon = Coupon::findOrFail($id);
        $pageTitle = "Coupon Details";
        return view('coupons.show',compact('coupon','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}



}
