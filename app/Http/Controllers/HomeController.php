<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\School;
use Illuminate\Http\Request;

class HomeController extends Controller {

	public function index(){

        $schools = School::all();
        return view('home.index',compact('schools'));
    }

}
