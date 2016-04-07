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

use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
	//User login action
	public function loginStudent(loginRequest $request)
	{
		//encrypt the password
		//$request->password = Crypt::encrypt($request->password);
				
        //return Redirect::action('AppController@home'); //???
		$credentials = $request->only('studentId', 'password');
         
		if(Auth::attempt($credentials, $request->remember))
		{
			return Auth::user();
			return Redirect::action('AppController@home'); //???
		}

//		if ($this->auth->attempt($credentials, $request->has('remember')))
//		{
//			return redirect()->intended($this->redirectPath());
//		}

		return redirect($this->loginPath())
			   ->withInput($request->only('email', 'remember'))
			   ->withErrors(['email' => $this->getFailedLoginMessage()]);
	}
	
	//User logout action
	public function logout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::action('AppController@home');
	}
}

?>