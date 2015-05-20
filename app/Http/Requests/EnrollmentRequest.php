<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentRequest extends Request {

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
			'course_id'=>'required|not_in:default',
            'authorization'=>'required',
		];
	}

    public function messages(){

        return [
           'course_id.required' => 'Please select a course.',
            'course_id.not_in' => 'Please select a course.',
            'authorization.required' => 'Please check box to verify you are a student in this course.'

        ];
    }

}
