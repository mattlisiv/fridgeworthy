<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdditonalStudentConfirmationRequest extends Request {

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

            'email'=>'required|email',
            'registration_id'=>'required',
            'authorization'=>'required'
        ];
    }

    public function messages()
    {

        return [
            'authorization.required'=>'Please confirm that you have read the Terms and Conditions.'

        ];
    }

}
