<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class DeleteAssignmentRequest extends Request {

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
            'assignment_id'=>'required|not_in:default',
        ];
    }

    public function messages()
    {

        return [
            'assignment_id.required' => 'Please select an assignment.',
            'assignment_id.not_in' => 'Please select an assignment.',

        ];
    }
}
