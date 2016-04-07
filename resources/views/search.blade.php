<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHARING TAXI</title>

	@include('lib.Metadata')
	@include('lib.jQuery')
    @include('lib.Custom_Fonts')
	@include('lib.bootstrap.core')
    @include('lib.bootstrap.date-time')
	@include('lib.Theme_Plugins')
	@include('lib.IE9_Compat')
	
	<!-- Post Functionality -->
	<script src = "{{URL::asset('js/appPostFunctions.js')}}"></script>
	<script src = "{{URL::asset('js/journeyPostFunctions.js')}}"></script>
	
	<!-- Request Functionality -->
	<script src = "{{URL::asset('js/appRequests.js')}}"></script>

</head>

<body>
	@include('parts.navbar')
</body>

</html>
