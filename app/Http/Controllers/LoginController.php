<?php namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Login Controller
|--------------------------------------------------------------------------
|
| This controller handles the user's ability to log into and out of
| their user account. Users must have first registered an account
| before they are allowed to log into the site.
|
| LoginController@loginStudent - Student user login action
| LoginController@logout - User logout action
|
*/

use App\Http\Requests\studentLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
	//User login action
	public function loginStudent(studentLoginRequest $request)
	{
        if(Auth::guard('studentsession')->attempt(['studentId' => $request->studentId,
		                                           'password' => $request->password],
												   $request->remember))
		{
			//Successful login
			return Redirect::intended('home');
		}

		//Unsuccessful login
		return Redirect::action('AppController@login')
			   ->withInput($request->only('studentId', 'password'))
			   ->withErrors(['password' => 'Invalid Password.']);
	}
	
	//User logout action
	public function logout()
	{
		Auth::guard('studentsession')->logout();
		Auth::guard('websession')->logout();
		Session::flush();
		return Redirect::action('AppController@home');
	}
}

?>