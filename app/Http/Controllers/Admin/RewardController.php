<?php namespace App\Http\Controllers\Admin;

use App\Business;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use Carbon\Carbon;
use App\Repositories\Interfaces\RewardRepositoryInterface as RewardRepositoryInterface;


class RewardController extends Controller {


    public function __construct(RewardRepositoryInterface $rewardRepositoryInterface,BusinessRepositoryInterface $businessRepositoryInterface){

        $this->rewardRepository = $rewardRepositoryInterface;
        $this->businessRepository = $businessRepositoryInterface;
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $rewards = $this->rewardRepository->all();
        $pageTitle = "Rewards Manager";
        return view('administrator.rewards.index',compact('rewards','pageTitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New Reward";
        $businesses = $this->businessRepository->all();
        return view('administrator.rewards.create',compact('pageTitle','businesses'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\RewardRequest $request
     * @return Response
     */
	public function store(Requests\RewardRequest $request)
	{
        $request['expiration'] = Carbon::createFromFormat('d/m/Y',$request['expiration']);
        $this->rewardRepository->store($request->all());
        return redirect()->action('Admin\RewardController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $reward = $this->rewardRepository->find($id);
        $pageTitle = $reward->name;
        return view('administrator.rewards.show',compact('reward','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $reward = $this->rewardRepository->find($id);
        $businesses = $this->businessRepository->all();
        $pageTitle = "Edit ".$reward->name;
        return view('administrator.rewards.edit',compact('reward','pageTitle','businesses'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param Requests\RewardRequest $request
     * @return Response
     */
	public function update($id,Requests\RewardRequest $request)
	{
        $request['expiration'] = Carbon::createFromFormat('d/m/Y',$request['expiration']);
        $this->rewardRepository->update($id,$request->all());

        return redirect()->action('Admin\RewardController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $this->rewardRepository->destroy($id);
        return redirect()->action('Admin\RewardController@index');
	}

}
