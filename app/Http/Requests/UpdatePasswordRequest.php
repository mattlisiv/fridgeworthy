<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Crypt;

class UpdatePasswordRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;

	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'password'=>'required|different:newpassword',
            'newpassword'=>'required|confirmed'

		];
	}

    public function messages(){

        return [
          'newpassword.required' => 'Please enter in a new password',
          'newpassword.confirmed'=> 'Your new password does not match the new password confirmation.' ,
          'password.different' => 'Your new password must be different than your previous password.',
          'password.required' => 'Please enter in your required.'

        ];
    }

}
