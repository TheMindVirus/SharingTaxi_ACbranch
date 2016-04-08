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
				<input type='button' id='post-journey-submit' class='btn btn-primary' onclick='journeySubmit()' value='Submit'>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>
<!--TODO: Refactor and Condense modals-->
