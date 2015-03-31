<?php namespace App\Http\Controllers;

use App\Business;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reward;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RewardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $rewards = Reward::all();
        $pageTitle = "Rewards Manager";
        return view('rewards.index',compact('rewards','pageTitle'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $pageTitle = "Create New Reward";
        $businesses = Business::all();
        return view('rewards.create',compact('pageTitle','businesses'));
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
        Reward::create($request->all());
        return redirect('admin/rewards');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $reward = Reward::findOrFail($id);
        $pageTitle = $reward->name;
        return view('rewards.show',compact('reward','pageTitle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $reward = Reward::findOrFail($id);
        $pageTitle = "Edit ".$reward->name;
        $businesses = Business::all();
        return view('rewards.edit',compact('reward','pageTitle','businesses'));
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
        $reward = Reward::findOrFail($id);
        $reward->update($request->all());

        return redirect('admin/rewards');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $reward = Reward::findOrFail($id);
        $reward->delete();
        return redirect('admin/rewards');
	}

}
