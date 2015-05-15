<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\School;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {


	public function index(){


        $user = Auth::user();
        $schools = School::all();
        return view('integration.indexintegration',compact('schools','user'));
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

        $validator = Validator::make($input, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'school_id'=>'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'grade'=> 'required_if:role,2',
            'parent_email'=>'required_if:role,2',
            'role'=>'required'
        ]);

        if($validator->fails()){

            return Redirect::back()->withErrors($validator,'registration');


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

            return Redirect::to('/');

        }

        }

    public function changePassword(){

        $user = Auth::user();
        return view('home.changepassword',compact('user'));
    }

    public function updatePassword(Requests\UpdatePasswordRequest $request){

        var_dump($request->all());

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

}
