<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHARING TAXI</title>
	@include('parts.lib')
</head>
	
<body>
	@include('parts.navbar', array('noBackground' => true))

	<header>
		@if(Session::has('flash_message'))
			<div style="position:absolute; top:140px; width: 400px; left:800px;"  class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{Session::get('flash_message')}}
			</div>
		@endif
			<div class="header-content">
				<div class="header-content-inner">
				<form action="/searchResults" class="form" method = "get">
					<input style="height:50px; width: 500px;" name="destination" id="destination" type="text" placeholder="Destination">
					<br/>
					<br/>
					<input class="btn btn-primary" type="submit" value="SEARCH">
					<a class="btn btn-primary" data-toggle="modal" data-target="#postJourney"
					onclick="journeyBtnClick()">POST JOURNEY</a>
				</form>
			</div>
		</div>
	</header>
	
</body>

</html>
