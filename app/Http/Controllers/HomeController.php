<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller {

	public function index(){

        $user = Auth::user();
        $schools = School::all();
        return view('home.index',compact('schools','user'));
    }

    public function logout(){

        Auth::logout();
        return Redirect::to('/');
    }

}
