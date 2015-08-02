<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CouponRequest extends Request {

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

            'couponType' => 'required',
            'couponNumber' => 'required_if:couponType,managed|integer|min:1',
            'couponCSV'=>'required_if:couponType,auto-managed',
            'reward_id' => 'required',
            'image'=>'required_if:couponType,imaged'
		];
	}

}
