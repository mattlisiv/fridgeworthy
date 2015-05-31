<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class SubmitAccessCodeRequest extends Request {

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
			'reward_id'=>'required|not_in:default',
            'access_code'=>'required|exists:coupons,access_code'
		];
	}

    public function messages(){


        return [
            'reward_id.required' => 'Please select a reward.',
            'reward_id.not_in' => 'Please select a reward.',
            'access_code.required'=>'Please enter in an access code.',
            'access_code.exists'=>'This access code does not exist. Please try again.'


        ];

    }

}
