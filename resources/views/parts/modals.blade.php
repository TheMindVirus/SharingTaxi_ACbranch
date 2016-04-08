<!-- Modal -->
<div id="postModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">JOURNEYS</h4>
			</div>

			<div class="modal-body" id="notifPosts">

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>

<!-- Journey Modal -->
<div  id="postJourney" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">JOURNEYS</h4>
			</div>
			<div class="modal-body" id="postJourneyBody">
				<input class = "form-control" style='height: 50px; width: 80%;' type='text' id='post-journey-destination' placeholder='Destination'>
				<br/>
				<input style='height: 50px; width: 80%;' class = 'form-control datetimepicker' id='post-journey-date'  placeholder='Date/Time'>
				<br/>
				<input type='button' id='post-journey-submit' class='btn btn-primary' onclick='postJourneySubmit()' value='Submit'>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>

<div  id="registerModal" class="modal fadeOutLeft" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div  style = "height: 400px;" class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">REGISTRATION</h3>
			</div>
			<div class="modal-body" id="postJourneyBody">
				@if (count($errors) > 0)
					<div class = "row" style = "position:relative; top:10px;">
						<div class = "col-lg-12">
							<div class="alert alert-danger" style = "width: 600px; margin-left:auto; margin-right:auto;">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endif
				<form class = "form">
					<input class = "form-control" type = "text" name = "firstName" id = "firstName" placeholder = "First Name"/>
					<br/>
					<input class = "form-control" type = "text" name ="studentId" id = "studentId" placeholder="StudentId"/>
					<br/>
					<input class = "form-control" type = "text" name = "campus" id = "campus" placeholder = "Campus"/>
					<br/>
					<input class = "form-control" type = "password" name = "password" placeholder = "password"/>
					<br/>
					<input class = "form-control" type = "password" name = "password_confirmation" placeholder = "Confirm Password"/>
					<br/>
					<input type = "submit" class = "btn btn-primary center-block" value = "REGISTER"/>
				</form>
			</div>
		</div>

	</div>

</div>