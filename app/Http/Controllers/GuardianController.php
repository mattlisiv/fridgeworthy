<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuardianController extends Controller {


    function __construct(){


    }


    function index(){

        $user = Auth::user();
        return view('guardian.getinvolved',compact('user'));
    }

    function store_suggestion(){

        $user = Auth::user();
        return view('guardian.suggestionreceived',compact('user'));
    }

}
