<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StoreAssignmentRequest extends Request {

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
        $today = Carbon::today('US/Eastern');
		return [
			'name'=>'required|min:5|max:25',
            'description'=>'required|min:10',
            'due_date'=>'date_format:"m/d/Y"|required|not_in:Select Date|after:'.$today,
            'course_id'=>'required'
		];
	}

}
