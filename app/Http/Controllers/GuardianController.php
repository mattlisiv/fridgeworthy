<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GuardianController extends Controller {


    function __construct(){


    }


    function index(){

        $user = Auth::user();
        return view('guardian.getinvolved',compact('user'));
    }

    function store_suggestion(Request $request){

        $user = Auth::user();


        $message1 = 'This suggestion was received from '.$user->full_name.' at '.Carbon::now().'.';
        $message2 = $request['suggestion'];
        $signer = 'The FridgeWorthy Support Team';
        $link_message = 'Check out our website';
        $link = 'http://www.fridge-worthy.com';
        $data = ['generic'=>true,'user'=>$user,'message1'=>$message1,'message2'=>$message2,'signer'=>$signer,'link_text'=>$link_message,'link'=>$link];
        Mail::send('emails.template', $data, function ($message){
            $message->from('customerservice@fridge-worthy.com', 'The FridgeWorthy Team');
            $message->to('support@fridge-worthy.com');
            $message->subject('Suggestion From Parent');
        });


        return view('guardian.suggestionreceived',compact('user'));
    }

}
