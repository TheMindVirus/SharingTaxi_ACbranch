<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHARING TAXI - LOGIN</title>

	@include('lib.Metadata')
	@include('lib.jQuery')
    @include('lib.Custom_Fonts')
	@include('lib.bootstrap.core')
	@include('lib.Theme_Plugins')
	@include('lib.IE9_Compat')
</head>

<body>
	@include('parts.navbar')
	
	<div style="position: relative; top: 100px;" class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><b>Student Login</b></div>
					<div class="panel-body">
						@if(count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif

						<form class="form-horizontal" role="form" method="POST" action="/auth/student/login">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label class="col-md-4 control-label">Student Id</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="studentId" value="{{ old('studentId') }}">
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">Password</label>
								<div class="col-md-6">
									<input type="password" class="form-control" name="password">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
										<label><input type="checkbox" name="remember">Remember Me</label>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary" style="margin-right: 15px;">Login</button>
                                    <a href="./forgot">Forgot Your Password?</a>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>