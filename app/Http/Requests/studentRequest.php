<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class studentRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(){return true;}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
				'studentId' => 'unique:students,studentId|required|string',
		        'firstName' => 'required|string',
		        'surname' => 'required|string',
			    'campus' => 'required|string',
//			    'phoneNumber' => 'digits:11',
			    'password' => 'required|confirmed|min:6',
			    'password_confirmation' => 'required'];
	}
}

?>