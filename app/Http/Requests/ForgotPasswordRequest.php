<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ForgotPasswordRequest extends Request {

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
            'email'=>'required|email|exists:users,email'
		];
	}

    public function messages(){


        return [

            'email.required'=>'Please enter an email.',
            'email.email'=>'The email entered is invalid. Please try again.',
            'email.exists'=>'The email is not recognized with a registered user.
            If you believe this is mistake, contact FridgeWorthy at support@fridge-worthy.com.',


        ];

    }
}
