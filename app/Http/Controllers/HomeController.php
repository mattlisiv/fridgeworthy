<?php namespace App\Http\Controllers;

use App\Control;
use App\EmailListServ;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\School;
use App\User;
use GrahamCampbell\Dropbox\Facades\Dropbox;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {


    public function __construct(){


    }

	public function index(){


        $user = Auth::user();
        $registration = null;
        $business = null;
        $customers = null;
        $schools = School::orderBy('name','ASC')->get();
        $registration = Control::where('name','=','registration')->first();
        if(get_class($user) =='App\BusinessManager'){
            $business = $user->business;
            $customers = $business->customers()->get();
        }
        return view('integration.indexintegration',compact('schools','user','business','customers','registration'));
    }

    public function logout(){

        Auth::logout();
        return Redirect::to('/');
    }

    public function login(Request $request){

        $credentials = $request->only('email', 'password');

        $rules = array(

            'email' => 'required|email',
            'password' => 'required|min:6'

        );

        $validator = Validator::make($credentials, $rules);



        if (Auth::attempt($credentials, $request->has('remember')))
        {
            return Redirect::back();
        }else{

               $validator->getMessageBag()->add('incorrect_login','The login entered does not match our records. Please try again.');
                return Redirect::back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors($validator,'login');
        }



    }

    public function register(Request $request){

        $input = $request->all();

        $messages = [

            'first_name.required' =>'First name is required.',
            'first_name.max' => 'First name cannot be more than 50 characters.',
            'last_name.required' => 'Last name is required.',
            'last_name.max' => 'Last name cannot be more than 50 characters.',
            'school_id.required' => 'Please select a school.',
            'role.required'=> 'Please select whether you are a student or teacher.',
            'parent_email.required' => 'A parent email is required if you are a student.',
            'parent_email.required_if' => 'A parent email is required if you are a student.',
            'grade.required' => 'Please select a grade if you are a student.',
            'grade.required_if' => 'Please select a grade if you are a student.'




        ];

        $validator = Validator::make($input, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'school_id'=>'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'grade'=> 'required_if:role,2',
            'parent_email'=>'required_if:role,2',
            'role'=>'required'
        ],$messages);

        if($validator->fails()){

            return Redirect::back()->withErrors($validator,'registration')->withInput($request->except('password','password_confirmation'));


        }else{

            if(!array_has($input,'grade')){

                $input['grade'] = null;
            }

            $user = User::create([
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'school_id' => $input['school_id'],
                'first_name'=> $input['first_name'],
                'last_name'=> $input['last_name'],
                'parent_email' =>$input['parent_email'],
                'grade'=>$input['grade'],
                'points'=> 0

            ]);

            if($input['role']==1){

                $user->attachRole(Role::teacher());

            }else if($input['role']==2){

                $user->attachRole(Role::student());

            }
            Auth::login($user);
            $user = Auth::user();
            return view('registration.created',compact('user'));

        }

        }

    public function changePassword(){

        $user = Auth::user();
        return view('home.changepassword',compact('user'));
    }

    public function updatePassword(Requests\UpdatePasswordRequest $request){

        $user = Auth::user();

        if(Hash::check($request['password'],$user->password)){


            $user->password = bcrypt($request['newpassword']);
            $user->save();

            return redirect()->action('HomeController@passwordChanged');
        }else{

            return redirect()->back();
        }


    }

    public function passwordChanged(){

        $user = Auth::user();
        return view('home.changedpassword',compact('user'));
    }

    public function forgotPassword(){

        $user = Auth::user();
        if(is_null($user)){
            return view('home.forgotpassword',compact('user'));
        }else{
           return redirect()->action('HomeController@index');
        }

    }


    public function error(){

        return view('home.partials.errors');
    }


    public function upload(){



        return view('teacher.documents.create');
    }


    public function signupForListserv(Requests\SignupListservRequest $request){


            EmailListServ::create($request->all());
            $user = Auth::user();
            return view('home.email-signup-complete',compact('user'));
        }
}
