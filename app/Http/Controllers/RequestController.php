<?php namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Request Controller
|--------------------------------------------------------------------------
|
| This Controller handles the user's request of a journey post.
|
| RequestController@request - request a post if it doesn't already exist //TODO: add exists
| RequestController@fetch - returns a list of the user's requests
| RequestController@accept - accept a request for a post
| RequestController@reject - reject a request for a post
|
*/

use App\Http\Requests;
use App\Models\requestModel;
use Illuminate\Http\Request;
use DB;

class RequestController extends Controller
{
	//create Request
	public function request($postId, $studentId, $requestStatus)
	{
		//then create the request
		requestModel::create(['postId' => $postId,
			                  'studentId' =>$studentId,
			                  'requestStatus' => 0]);
		return 'success';
	}

	//check if a request exists
	public function exists(Request $request)
	{
		//for now student request is automatically 1600428
		$requestStatus = 0;
		$postId = $request->postId;
		$studentId = $request->studentId;

		//check the db for the request
		$requestFromDb = DB::table('requests')->where('studentId','=', $studentId)
			->where('postId','=',$postId);

		//if the request doesnt exist
		if($requestFromDb->count() != 0)
		{
			//delete request from table
			$requestFromDb->delete();
			return 'deleted';
		}
		else
		{
			requestModel::create([
				'postId' => $postId,
				'studentId' =>$studentId,
				'requestStatus' => 0
			]);
			return 'success';
		}
	}

	//returns a list of the user's requests
	public function fetch()
	{
		//get the logged-in user's studentId
		$studentId = Auth::guard('studentsession')->user()->studentId();

		//get all the request for the student
		$studentRequests = DB::table('requests')->where('studentId','LIKE',$studentId)->get();

		$resultsInJson = json_encode($studentRequests);
		return $resultsInJson;
	}
	
	//accepts a request
	public function accept(Request $request)
	{
		$studentId = $request->studentId;
		$postId = $request->postId;

		////change the request status to 1 (accepted)
		$request = DB::table('requests')->where('studentId','=',$studentId)
			->where('postId','=',$postId)->update(array('requestStatus' => 1));
	}

	//rejects a request
	public function reject(Request $request)
	{
		$studentId = $request->studentId;
		$postId = $request->postId;

		//change the request status to 2 (rejected)
		$request = DB::table('requests')->where('studentId','=',$studentId)
			->where('postId','=',$postId)->update(array('requestStatus' => 2));
	}
}

?>