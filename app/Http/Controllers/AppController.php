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
|
*/

class AppController extends Controller
{	
	//Homepage
	public function home(){return view('home');}
	
	//Search results page
	public function search(){return view('search');}
	
	//User login page
	public function login(){return view('auth.login');}
	
	//User registration page
	public function register(){return view('auth.register');}
}

?>