<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class postRequest extends Request
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
		return ['destination' => 'required|string',
			    'date' => 'required|date_format:Y-m-d H:i|after:yesterday']; //TODO: validate only if date is in the future using 'after'
	}
}

?>