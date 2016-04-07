<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

use App\requestsModel;

/*
|--------------------------------------------------------------------------
| Request Controller
|--------------------------------------------------------------------------
|
| This Controller handles the user's request of a journey post.
|
| RequestController@request - request a post if it doesn't already exist
| RequestController@check - returns a list of the user's requests
| RequestController@accept - accept a request for a post
| RequestController@reject - reject a request for a post
|
*/

class RequestController extends Controller
{
	public function request($postId, $studentId, $requestStatus)
	{
		//then create the request
		requestsModel::create([
			'postId' => $postId,
			'studentId' =>$studentId,
			'requestStatus' => 0
		]);
		return 'success';
	}


	//create Request
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
			requestsModel::create([
				'postId' => $postId,
				'studentId' =>$studentId,
				'requestStatus' => 0
			]);
			return 'success';
		}
	}

	//returns a list of the user's requests
	public function check()
	{
		//Normally we would use the logged in user but user for now we use student id
		$studentId = 1600428;

		//get all the request for the logged in student
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