<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//-PAGES-------------------------------------------------------------------

Route::get('/',        'AppController@home');      //Homepage (index)
Route::get('home',     'AppController@home');      //Homepage
Route::get('login',    'AppController@login');     //User login page
Route::get('register', 'AppController@register');  //User registration page
Route::get('forgot',   'AppController@forgot');    //User password reset page

//-POSTS-------------------------------------------------------------------

Route::get('searchResults', 'PostController@search');  //Search for posts
Route::post('post/Journey', 'PostController@post');    //Posts a journey
Route::get('post/Fetch',    'PostController@fetch');   //Fetches a user's posts

//-REQUESTS----------------------------------------------------------------

Route::post('request/Journey', 'RequestController@request');  //Creates a request for a specific post
Route::get('request/Fetch',    'RequestController@fetch');    //Fetches a user's requests
Route::get('request/Accept',   'RequestController@accept');   //Accepts a request
Route::get('request/Reject',   'RequestController@reject');   //Rejects a request

//-AUTHORISATION-----------------------------------------------------------

Route::post('auth/student/login', 'LoginController@loginStudent');  //Student user login action
Route::get('auth/logout',         'LoginController@logout');        //User logout action

Route::post('auth/student/register',
            'RegistrationController@addStudent');      //Adds a new student user
Route::get('auth/student/verify/{confirmationCode}',
            'RegistrationController@confirmStudent');  //Confirms a new student user (email link)
Route::post('auth/student/reset',
            'RegistrationController@resetStudent');    //Resets a student user's password

//OLD STUFF
/*

Route::get('postJourney', 'postController@postJourney');

Route::get('acceptRequest','requestController@acceptRequest');

Route::get('rejectRequest', 'requestController@rejectRequest');

Route::post('ajaxState', 'requestController@doesRequestExist');

Route::get('searchResults', 'searchController@search');

//request to check for request for logged in users post
Route::get('loggedInUsersRequestNotification', 'requestController@checkForRequest');
//AC: CHANGE THIS TO POSTS AND REQUESTS? CREATE SEPARATE CONTROLLERS OR REUSE POSTCONTROLLER
*/
?>