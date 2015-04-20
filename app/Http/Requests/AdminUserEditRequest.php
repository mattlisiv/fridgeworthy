<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUserEditRequest extends Request {

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
            'email'=>'required|email|unique:users,email,'.$this->get('id'),
            'role'=>'required',
            'parent_email'=>'required_if:role,2',
            'grade'=>'required_if:role,2',
            'points'=>'required_if:role,1,2,3',
            'business_id'=>'required_if:role,4',
            'school_id'=>'required_if:role,1,2,3',
            'status'=>'required',
            'password_reset'=>'required'
		];
	}

}
