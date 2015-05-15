<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UpdateGradeRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        $user = Auth::user();
        if(get_class($user)=='App\Teacher'){
            return true;
        }else{
            return false;
        }
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'grade_id'=>'required',
            'revised_grade'=>'required_if:action,edit'
		];
	}

}
