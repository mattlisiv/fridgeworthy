<?php namespace App\Http\Controllers\Business;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use GrahamCampbell\Dropbox\Facades\Dropbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = Auth::user();
        $business = $user->business;
        $customers = $business->customers()->get();
		return view('business.home.index',compact('user','business','customers'));
	}





}
