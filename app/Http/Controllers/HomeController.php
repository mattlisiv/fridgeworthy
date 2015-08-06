<?php namespace App\Http\Controllers;

use App\Control;
use App\Custom\Helper;
use App\EmailListServ;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ParentStudentRelation;
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
use Illuminate\Support\Facades\Mail;
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

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
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
            'grade.required_if' => 'Please select a grade if you are a student.',
            'email.unique'=> 'This email already is registered to another user.',
            'email.different'=>'A student\'s email may not be the same as a parent\'s email.',


        ];

        $validator = Validator::make($input, [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'school_id'=>'required',
            'email' => 'required|email|max:255|unique:users,email|unique:users,parent_email|different:parent_email',
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

            $parent_confirmation = 'confirmed';

            if($input['role']==2){
                $parent_confirmation = 'unconfirmed';
            }

            $hash_created = false;

            $registration_hash = null;



            while(!$hash_created) {

                $registration_hash = Helper::generate_random_twelve_character_access();

                $rules = array(
                    'registration_hash' => 'unique:users,registration_hash'
                );


                $validator = Validator::make(['registration_hash' => $registration_hash], $rules);
                if (!$validator->fails()) {

                    $hash_created = true;
                }

            }
            $user = User::create([
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'school_id' => $input['school_id'],
                'first_name'=> $input['first_name'],
                'last_name'=> $input['last_name'],
                'parent_email' =>$input['parent_email'],
                'grade'=>$input['grade'],
                'points'=> 0,
                'parent_confirmation'=>$parent_confirmation,
                'registration_hash'=> $registration_hash

            ]);

            if($input['role']==1){

                $user->attachRole(Role::teacher());

                $message1 = "Thank you for registering for FridgeWorthy!
                We are beyond excited to provide our service for your school and could not be more ecstatic for your participation. Leading up to the 2015-2016 school year, we have partnered with a number of local businesses in an effort to provide exclusive offers,
                deals, and rewards for the continued promotion of academic success. Start earning your FridgePoints, because Hard Work Pays Off!";
                $message2 = null;
                $signer = 'The FridgeWorthy Team';
                $link_message = 'Check out our website';
                $link = 'http://www.fridge-worthy.com';
                $email = $user->email;
                $data = ['generic'=>false,'user'=>$user,'message1'=>$message1,'message2'=>$message2,'signer'=>$signer,'link_text'=>$link_message,'link'=>$link];
                Mail::send('emails.template', $data, function ($message) use($email) {
                    $message->from('customerservice@fridge-worthy.com', 'The FridgeWorthy Team');
                    $message->to($email);
                    $message->subject('Welcome to FridgeWorthy!');
                });

            }else if($input['role']==2){

                $user->attachRole(Role::student());

                $parent = new User();

                $message1 = 'Your student, '.$user->full_name.', has created an account with FridgeWorthy, a fun, rewarding site where students, teachers, and parents all earn rewards.';
                $message2 = 'We need your help. Please complete your account and verify that your student has the ability to submit grades. The sooner your account is created, the sooner you can earn rewards.';
                $signer = 'The FridgeWorthy Support Team';
                $link_message = 'Complete My Account';
                $link = 'http://www.' . env('DOMAIN').'/parent-confirmation/'.$user->registration_hash.'?email='.$user->parent_email;

                $data = ['generic'=>true,'user'=>$user,'message1'=>$message1,'message2'=>$message2,'signer'=>$signer,'link_text'=>$link_message,'link'=>$link];

                Mail::send('emails.template', $data, function ($message) use($user) {
                    $message->from('customerservice@fridge-worthy.com', 'The FridgeWorthy Team');
                    $message->to($user->parent_email);
                    $message->subject('Complete Your FridgeWorthy Account.');
                });

                $message1 = "Thank you for registering for FridgeWorthy! We are
                beyond excited to provide our service for your school and
                could not be more ecstatic for your participation. Leading up to the 2015-2016 school year,
                we have partnered with a number of local businesses in an effort to provide exclusive offers, deals, and rewards for the
                continued promotion of academic success. Crack open your books and start earning your FridgePoints, because Hard Work Pays Off!";
                $message2 = null;
                $signer = 'The FridgeWorthy Team';
                $link_message = 'Check out our website';
                $link = 'http://www.fridge-worthy.com';
                $email = $user->email;
                $data = ['generic'=>false,'user'=>$user,'message1'=>$message1,'message2'=>$message2,'signer'=>$signer,'link_text'=>$link_message,'link'=>$link];
                Mail::send('emails.template', $data, function ($message) use($email) {
                    $message->from('customerservice@fridge-worthy.com', 'The FridgeWorthy Team');
                    $message->to($email);
                    $message->subject('Welcome to FridgeWorthy!');
                });




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

    public function parent_confirmation(Request $request,$registration_hash){

        $parent_email = $request['email'];

        $registration_id = $registration_hash;

        $student = User::where('parent_email','=',$parent_email)->where('registration_hash','=',$registration_hash)->first();

        $user = null;

        if(is_null($student)){

            $user = null;
            return view("registration.failed",compact('user'));

        }else{

            $parent = User::where('email','=',$parent_email);
            if(count($parent->get())==0){

                return view('home.confirmstudent',compact('student','user','registration_id'));
            }else{

                return view('home.confirm-additional-student',compact('student','user','registration_id'));

            }

        }


    }

    public function ConfirmAdditionalStudent(Requests\AdditonalStudentConfirmationRequest $request){


        $registration_hash = $request['registration_id'];
        $parent_email = $request['email'];

        $parent = User::where('email','=',$parent_email)->first();

        $student = User::where('parent_email','=',$parent_email)->where('registration_hash','=',$registration_hash)->first();

        if(is_null($student) || is_null($parent)){

            $user = null;
            return view("registration.failed",compact('user'));

        }else {

            $student->parent_confirmation = 'confirmed';
            $student->registration_hash = 'CONFIRMED';
            $student->save();

            ParentStudentRelation::create(['parent_id'=>$parent->id,'student_id'=>$student->id,'status'=>'confirmed']);

            Auth::login($parent);
            $user = Auth::user();
            return view('registration.studentadded',compact('user'));


            }
        }


    public function ConfirmAndCreateParentAccount(Requests\ConfirmStudentRequest $request){

        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $password = $request['password'];
        $registration_hash = $request['registration_id'];
        $parent_email = $request['email'];

        $student = User::where('parent_email','=',$parent_email)->where('registration_hash','=',$registration_hash)->first();

        if(is_null($student)){

            $user = null;
            return view("registration.failed",compact('user'));

        }else{

            $student->parent_confirmation = 'confirmed';
            $student->registration_hash = 'CONFIRMED';
            $student->save();

            $parent = User::create(['email'=>$parent_email,'first_name'=>$first_name,'last_name'=>$last_name,'password'=>bcrypt($password),'school_id'=>$student->school_id]);
            $parent->attachRole(Role::guardian());
            ParentStudentRelation::create(['parent_id'=>$parent->id,'student_id'=>$student->id,'status'=>'confirmed']);

            Auth::login($parent);
            $user = Auth::user();

            $message1 = "Thank you for registering for FridgeWorthy!
            We are beyond excited to provide our service for your school and could not be more ecstatic for your participation. Leading up to the 2015-2016 school year, we have partnered with a number of local businesses in an effort to provide exclusive offers,
            deals, and rewards for the continued promotion of academic success. Start earning your FridgePoints, because Hard Work Pays Off!";
            $message2 = null;
            $signer = 'The FridgeWorthy Team';
            $link_message = 'Check out our website';
            $link = 'http://www.fridge-worthy.com';
            $email = $user->email;
            $data = ['generic'=>false,'user'=>$user,'message1'=>$message1,'message2'=>$message2,'signer'=>$signer,'link_text'=>$link_message,'link'=>$link];
            Mail::send('emails.template', $data, function ($message) use($email) {
                $message->from('customerservice@fridge-worthy.com', 'The FridgeWorthy Team');
                $message->to($email);
                $message->subject('Welcome to FridgeWorthy!');
            });

            return view('registration.parentcreated',compact('user'));


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

    public function TermsAndConditions(){

        $pageTitle = "Terms and Conditions";
;
        return view("static.terms",compact('pageTitle'));
    }

    public function resetPassword(Requests\ForgotPasswordRequest $request){

        $email = $request['email'];
        $user = User::where('email','=',$email)->firstOrFail();
        $new_password = Helper::generate_random_twelve_character_access();
        $user->password = bcrypt($new_password);
        $user->save();
        $message1 = 'Your password has been changed! It seems that you have forgot your password, so we have reset it for you. If you did not change your password, please contact FridgeWorthy at support@fridge-worthy.com .';
        $message2 = 'Your new password: '.$new_password.'. We suggest you change your password when logging in again for the first time.';
        $signer = 'The FridgeWorthy Support Team';
        $link_message = 'Click here to login';
        $link = 'http://www.fridge-worthy.com';

        $data = ['generic'=>false,'user'=>$user,'message1'=>$message1,'message2'=>$message2,'signer'=>$signer,'link_text'=>$link_message,'link'=>$link];
            Mail::send('emails.template', $data, function ($message) use($email) {
                 $message->from('customerservice@fridge-worthy.com', 'The FridgeWorthy Team');
                 $message->to($email);
                 $message->subject('Your FridgeWorthy password has been reset.');
             });

        return view('home.passwordreset');
    }

    public function error(){

        return view('home.partials.errors');
    }


    public function signupForListserv(Requests\SignupListservRequest $request){


            EmailListServ::create($request->all());

        $message1 = 'Thanks for wanting to know more about FridgeWorthy. We\'ll keep you updated with exciting news and let you know how you can become involved.';
        $message2 = null;
        $signer = 'The FridgeWorthy Support Team';
        $link_message = 'Check out our website';
        $link = 'http://www.fridge-worthy.com';
        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $email = $request['email'];
        $data = ['generic'=>false,'user'=>$user,'message1'=>$message1,'message2'=>$message2,'signer'=>$signer,'link_text'=>$link_message,'link'=>$link];
        Mail::send('emails.template', $data, function ($message) use($email) {
            $message->from('customerservice@fridge-worthy.com', 'The FridgeWorthy Team');
            $message->to($email);
            $message->subject('Welcome to FridgeWorthy!');
        });

            $user = Auth::user();
            return view('home.email-signup-complete',compact('user'));
        }
}
