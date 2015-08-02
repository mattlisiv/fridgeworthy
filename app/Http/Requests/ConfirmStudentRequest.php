<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfirmStudentRequest extends Request {

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
            'email'=>'required|email',
            'password'=>'required||min:6',
            'registration_id'=>'required',
            'authorization'=>'required'
		];
	}

    public function messages()
    {

        return [
            'first_name.required' => 'Please enter in your first name',
            'last_name.required' => 'Please enter in your in last name.',
            'password.required'=>'Please enter in a password.',
            'password.confirmed'=>'The confirmed password does not match',
            'authorization.required'=>'Please confirm that you have read the Terms and Conditions.'



        ];
    }

}
