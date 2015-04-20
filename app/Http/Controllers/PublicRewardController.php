<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reward;
use Illuminate\Support\Facades\Auth;

class PublicRewardController extends Controller {


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

}
