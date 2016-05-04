<?php namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| App Controller
|--------------------------------------------------------------------------
|
| This controller handles the main pages of the website encountered by
| the client. It simply returns a view depending on which function is
| called by the routes.php file.
|
| AppController@home - homepage
| AppController@search - search results
| AppController@login - user login page
| AppController@register - user registration page
| AppController@forgot - user password reset page
|
*/

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AppController extends Controller
{	
	//Homepage
	public function home(){return view('home');}
	
	//Search results page

	//User login page
	public function login()
	{
		if(!Session::has('url.intended'))
			Session::put('url.intended', URL::previous());
		return view('auth.login');
	}
	
	//User registration page
	public function register()
	{
		Session::forget('url.intended');
		return view('auth.register');
	}
	
	//User password reset page
	public function forgot()
	{
		if(!Session::has('url.intended'))
			Session::put('url.intended', URL::previous());
		return view('auth.reset');
	}
}

?>