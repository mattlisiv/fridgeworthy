<?php namespace App\Http\Controllers\Admin;

use App\Business;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RelatedImage;
use App\Repositories\Interfaces\BusinessRepositoryInterface;
use Carbon\Carbon;
use App\Repositories\Interfaces\RewardRepositoryInterface as RewardRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;


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
        $request['expiration'] = Carbon::createFromFormat('m/d/Y',$request['expiration']);
        $reward = $this->rewardRepository->store($request->all());
        if($request->hasFile('image')){

            $disk = Storage::disk('local');
            $img_name = 'reward-'.$reward->id.".".$request->file('image')->getClientOriginalExtension();
            $destination = 'uploads';
            $request->file('image')->move($destination,$img_name);
            $relatedImg= RelatedImage::create(['reward_id'=>$reward->id,'file_path'=>'/'.$destination.'/'.$img_name]);

        }

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


        $reward = $this->rewardRepository->findWithImage($id);
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
        $reward = $this->rewardRepository->findWithImage($id);
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
        $request['expiration'] = Carbon::createFromFormat('m/d/Y',$request['expiration']);
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
