<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdministratorController extends Controller {

	public function index(){

        $pageTitle = "Adminstrator Dashboard";
        return view("administrator.index",compact('pageTitle'));
    }

}
