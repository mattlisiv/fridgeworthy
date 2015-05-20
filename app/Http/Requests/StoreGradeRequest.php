<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreGradeRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

        $user = Auth::user();
        if(get_class($user)=='App\Student'){
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
			'assignment_id'=>'required|not_in:default',
            'numeric_grade'=>'required|integer|min:0|max:100'
		];
	}

    public function messages(){

        return [
            'assignment_id.not_in' => 'Please select an assignment.',
            'numeric_grade.integer'=> 'Please input a grade between 0 and 100.',
            'numeric_grade.required'=> 'Please input a grade between 0 and 100.',
            'numeric_grade.max'=> 'Please input a grade between 0 and 100.',
            'numeric_grade.min'=> 'Please input a grade between 0 and 100.'


        ];
    }

}
