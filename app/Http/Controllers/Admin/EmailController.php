<?php namespace App\Http\Controllers\Admin;

use App\EmailListServ;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EmailController extends Controller {

    public function index(){

        $pageTitle = "Email Management System";

        $emails = EmailListServ::all();
        return view("administrator.emails.index",compact('pageTitle','emails'));
    }

}
