<?php namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Custom\Helper;
use App\Http\Requests;
use App\Reward;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CouponRepositoryInterface as CouponRepositoryInterface;
use App\Repositories\Interfaces\RewardRepositoryInterface as RewardRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller {

    public function __construct(CouponRepositoryInterface $couponRepositoryInterface,RewardRepositoryInterface $rewardRepositoryInterface){

        $this->couponRepository = $couponRepositoryInterface;
        $this->rewardRepository = $rewardRepositoryInterface;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $pageTitle = "Coupon Manager";
        $coupons = $this->couponRepository->allWithReward();
		return view('administrator.coupons.index',compact('pageTitle','coupons'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New Coupon";
        $rewards = $this->rewardRepository->all();
        return view('administrator.coupons.create',compact('pageTitle','rewards'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\CouponRequest $request
     * @return Response
     */
	public function store(Requests\CouponRequest $request)
	{
        $this->couponRepository->store($request->all());
        return redirect()->action('Admin\CouponController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $coupon = $this->couponRepository->find($id);
        $pageTitle = "Coupon Details";
        return view('administrator.coupons.show',compact('coupon','pageTitle'));
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
