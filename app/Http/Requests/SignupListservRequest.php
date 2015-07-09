<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignupListservRequest extends Request {

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
			'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:email_signup,email',
            'type'=>'required'
		];
	}

    public function messages(){


        return [
            'first_name.required' => 'Please include your first name.',
            'last_name.required' => 'Please include your last name.',
            'email.required'=>'Please enter an email.',
            'email.email'=>'The email entered is invalid. Please try again.',
            'email.unique'=>'The email entered already exists. Please try again.',
            'type.required'=>'Please provide information about who you are.'


        ];

    }


}
