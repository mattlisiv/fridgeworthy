<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller {


    public function privacy(){

        $user = Auth::user();
        $pageTitle = "Privacy Policy";
        return view("static.privacypolicy",compact('pageTitle','user'));
    }


    public function infographic(){

        $user = Auth::user();
        return view("static.infographic",compact('user'));
    }

    public function studentPointSystemInfographic(){

        $user = Auth::user();
        return view("static.pointsystem-student",compact('user'));
    }

    public function teacherPointSystemInfographic(){

        $user = Auth::user();
        return view("static.pointsystem-teacher",compact('user'));
    }

}
