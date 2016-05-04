<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHARING TAXI - SEARCH</title>
	@include('parts.lib')
	<style>
		img.profilePicture{
			height: 200px;
			width:200px;
			border-radius:100px;
		}

		.stylishButton{
			height:85px;
			width: 85px;
		}

		.vcenter {
			margin-top:25px;
			display: inline-block;
			vertical-align: middle;
			float: none;
		}

		.resultCaption{
			font-weight:bold;
		}
	</style>
</head>

<body>
	@include('parts.navbar')
	
	<div style = " margin-left:auto; width:500px; margin-bottom:0; height:0px; margin-right:auto;  background-color: #ffffff; position:relative; top:70px;">
		<h1 style = "padding-left:200px; left:50%; color:#000000;"><b>JOURNEYS</b></h1>
	</div>
    <div style = "position: relative; top: 190px;" class = "row">
	    <div class = "col-lg-12">
			@if(isset($searchResults))
				@foreach($searchResults as $results)
					<div class ="container " >
						<div class = "row">
							<div class = "col-lg-3" >
								<img class = "profilePicture" src = "{{URL::asset('img/defaultUser.png')}}"/>
							</div>
							<div class = "col-lg-4" style = "font-size:12px;">
								<p><span class = "resultCaption">Student ID No: </span>{{$results->studentId}}</p>
								<p><span class = "resultCaption">Destination </span>{{$results->destination}}</p>
								<p><span class = "resultCaption">Campus: </span>{{$results->campus}}</p>
								<p><span class = "resultCaption">Fare Price: </span>{{$results->farePrice}}</p>
								<p><span class = "resultCaption">PercentageToPay: </span>{{$results->percentageToPay}}</p>
								<?php
								//so this partial is simply meant to update the controller button when the view is opened depending on the user that visits that page
								$class = "btn btn-primary";
								$text = "Request";


								if($studentsRequests != null)
								{
									foreach($studentsRequests as $request)
									{
										if($request->postId == $results->postId)
										{
											if($request ->requestStatus == 0)
											{
												$class = "btn btn-warning";
												$text = "Requested";
											}	
											if($request->requestStatus == 1){
												$class = "btn btn-success";
												$text = "Accepted";
											}
											else if($request->requestStatus == 2){
												$class = "btn btn-danger";
												$text = "Rejected";
											}
										}
									}
								}
								?> <!--TODO: CHANGE STUDENT ID!-->
							</div>
							<div class = "col-lg-5">
								<div style = "margin-left:auto; margin-right:100px; margin-top:70px;">
									<a  class = "{{$class}} stylishButton" onclick = "requestJourney('{{$results->postId}}', 1600425)" id = "requestButton"><span class = "vcenter">{{$text}}</span></a>
								</div>
							</div>
							<hr style = "width:89%; margin-top:200px; border:2px solid lightgrey;">
						</div>
					</div>
				@endforeach
				<?php echo $searchResults->render(); ?>
			@endif
		</div>
	</div>

</body>
</html>