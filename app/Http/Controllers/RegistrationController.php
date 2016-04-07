<?php namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Registration Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users of different kinds.
| Before new users can fully use the website, they must confirm their
| account using a confirmation link sent by e-mail.
|
| RegistrationController@addStudent - add a new student user to the database
| RegistrationController@confirmStudent - confirm a new student user account from e-mail link
| RegistrationController@resetStudent - reset a student user's password
|
*/

use App\Http\Requests\studentRequest;
use App\Http\Models\studentModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Mail;

class RegistrationController extends Controller
{
	//add a new student user to the database
	public function addStudent(studentRequest $request)
	{
		//just store the users details in variables
		$studentId = $request->studentId;
		$firstName = $request->firstName;
		$surname = $request->surname;
		$campus = $request ->campus;
		$studentEmail = $studentId .'@buckingham.ac.uk';

		//encrypt the password
		$password = bcrypt($request->password);//Crypt::encrypt($request->password);

		//random confirmation code
		$confirmation_code = str_random(30);
		//pass confirmation code to an array
		$data = ['confirmation_code' => $confirmation_code,
				 'studentEmail' => $studentEmail];

		//create the user, obvious init :)
		studentModel::create(['studentId' => $studentId,
		                      'firstName' => $firstName,
		                      'surname' => $surname,
			                  'campus' => $campus,
			                  'confirmation_code' => $confirmation_code,
			                  'password' => $password]);

		//send mail to user with confirmation code
		Mail::send('emails.verifyStudent', $data, function($message)
		{
			$message->from('DoNotReply@rideAlong.com', 'Do Not Reply');
			$message->to(Input::get('studentId').'@buckingham.ac.uk', Input::get('firstName'))->subject('Verify your email address');
		});

		//flash message to show in the home page
		Session::flash('flash_message','Please check your email to confirm your identity');
		return Redirect::action('AppController@home');
	}

	//confirm a new user account from e-mail link
	public function confirmStudent($confirmation_code)
	{
		//if there's no confirmation code, throw an error
		if(!$confirmation_code) throw new InvalidConfirmationCodeException;

		//get the student with that confirmation code from student table
		$student = studentModel::where('confirmation_code', '=', $confirmation_code)->first();

		//if there's no matching student, throw an error
		if(!$student) throw new InvalidConfirmationCodeException;

		$student->confirmed = 1;
		$student->confirmation_code = null;
		$student->save();

		//flash message to show in the home page
		Session::flash('flash_message','Your email address has been verified');
		return Redirect::action('AppController@home');
	}
	
	//reset a student user's password
	public function resetStudent()
	{
		return Redirect::action('AppController@home'); //TODO: reset password functionality
	}
}

?>