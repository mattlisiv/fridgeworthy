<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StoreCourseRequest extends Request {

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

    public function messages(){

        return [
          'name.required' => 'Please provide a class name.',
          'description.required' =>'Please provide a description.',
          'name.min' => 'Class name must be at least 5 characters.',
          'description.min' => 'Class description must be at least 10 characters.'
        ];
    }

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'name' => 'required|min:5|max:25',
            'description' => 'required|min:10'
		];
	}


}
