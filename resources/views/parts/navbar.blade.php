@include('parts.modals')
<nav class="navbar navbar-default navbar-fixed-top"

{{-- Give the element a custom id --}}
@if(isset($id))
	id="{{$id}}"
@else
	id="mainNav"
@endif

{{-- Choose whether to have a background or not --}}
@if(((isset($noBackground)) && ($noBackground != true)) || (isset($noBackground) == false))
	style="background-color: #000000;"
@endif

>
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="./home">Sharing Taxi</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::guard('studentsession')->check())
					<li><a>{{Auth::guard('studentsession')->user()->studentId}}</a></li>
					<li><a onclick = "postCheck()" data-toggle="modal" data-target="#postModal">Posts</a></li>
					<li><a onclick = "requestCheck()" data-toggle="modal" data-target="#postModal">Requests</a></li>
					<li><a href="./auth/logout">Logout</a></li>
				@else
					<li><a href="./register">Register</a></li>
					<li><a href="./login">Login</a></li>
				@endif
			</ul>
		</div>
		
	</div>

</nav>