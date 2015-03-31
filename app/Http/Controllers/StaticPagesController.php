<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StaticPagesController extends Controller {


    public function privacy(){

        $pageTitle = "Privacy Policy";
        return view("static.privacypolicy",compact('pageTitle'));
    }


    public function infographic(){

        return view("static.infographic");
    }

}
