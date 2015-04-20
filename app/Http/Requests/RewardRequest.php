<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RewardRequest extends Request {

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
            'name' => 'required|min:7',
            'description' => 'required|min:15',
            'expiration'=>'required',
            'points_required'=> 'required',
            'business_id'=>'required',
            'dollar_amount'=>'required',
            'image' => 'mimes:jpeg,bmp,png'
		];
	}

}
