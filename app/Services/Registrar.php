<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */



	public function validator(array $data)
	{
		return Validator::make($data, [
			'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'school_id'=>'required',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
            'grade'=> 'required_if:role,student',
            'parent_email'=>'required_if:role,student',
            'role'=>'required'
		]);


	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        if(!array_key_exists('grade',$data)){

            $data['grade'] = 99;
        }
		return User::create([
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
            'school_id' => $data['school_id'],
            'first_name'=> $data['first_name'],
            'last_name'=> $data['last_name'],
            'parent_email' =>$data['parent_email'],
            'grade'=>$data['grade'],
            'points'=> 0

		]);

	}

}
