<?php namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Post Controller
|--------------------------------------------------------------------------
|
| This controller allows users to advertise their journeys to other users.
| It also handles the searching of posts and fetching of a user's posts.
|
| PostController@search - search for advertised posts
| PostController@create - create a journey to advertise
| PostController@fetch - fetch the logged-in user's posts
|
*/

use App\Http\Requests;
use App\Http\Requests\postRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class postController extends Controller
{
	//search for advertised posts
	public function search(Request $request)
	{
		//get a list of already requested posts for the logged-in user
		if(Auth::guard('studentsession')->check())
			$studentsRequests = DB::table('requests')
		        ->where('studentId','LIKE',Auth::guard('studentsession')->user()->requests);
		else
			$studentsRequests = [];

		//get the destination and the currentLocation
		$currentLocation = $request->currentLocation;
		$destination = $request->destination;

		//query the table for the search //TODO: Optimise and order search
		$searchResults = DB::table('posts')->where('destination','LIKE',$destination)->paginate();
		//	->orwhere('campus','LIKE',$currentLocation)->paginate(10);

		//$searchResults = DB::table('posts')->paginate();

		//send results to the search result view and array of student requests
		return view('search')->with(compact('searchResults', 'studentsRequests'));
	}
	
	//create a journey to advertise
    public function post(postRequest $request) //TODO: Why doesn't postModel exist?
    {
		//parse the date
		$delim = strpos($request->date, ' ');
		$date = substr($request->date, 0, $delim);
		$time = substr($request->date, $delim + 1, strlen($request->date));
		//TODO: Check if identical post already exists? Prevent form resubmission?
		
		$success = DB::table('posts')->insert(['studentId' => Auth::guard('studentsession')->user()->studentId,
                                               'destination' => $request->destination,
                                               'date' => $date,
											   'time' => $time]);
        return (string)$success;
    }
	
	//fetch the logged-in user's posts
	public function fetch(Request $request) //TODO: studentId no longer needs to be sent for fetch
	{
		//get the logged-in user's studentId
		$studentId = Auth::guard('studentsession')->user()->studentId;

		//get all the request for the logged in student
		$studentRequests = DB::table('posts')->where('studentId','LIKE',$studentId)->get();

		$resultsInJson = json_encode($studentRequests);
		return $resultsInJson;
	}
}

?>