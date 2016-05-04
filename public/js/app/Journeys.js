/**
 * Created by Emmanuel Audu on 22/03/2016.
 * Edited by Alastair Cota on 08/04/2016.
 */
//Description: This file contains the functions for posting a journey

//Carry accross the Destination field from the homepage -> modal
function journeyBtnClick()
{
	//TODO: Force login first, either now or on Submit, then return back here and complete the submission
	
    //get the value of the destination
    var value = document.getElementById('destination').value;
    //update users destination with the value
    document.getElementById('post-journey-destination').value = value;

    //var postHTML = "<input style='height: 50px; width: 80%;' type='text' id='post-journey-destination' class='' value='" + document.getElementById("destination").value + "' placeholder='Destination'>"
    //    + "<br><br>"
    //    + "<input style='height: 50px; width: 80%;' class = 'datetimepicker' id='post-journey-date'  placeholder='Date/Time'>"
    //    + "<br><br><br>"
    //    + "<input type='button' id='post-journey-submit' class='btn btn-primary' onclick='postJourneySubmit()' value='Submit' style='position:relative; margin-top: -15px;'>"
    //    + "<br>";
    //document.getElementById("postJourneyBody").innerHTML = postHTML;
}

//This the what happens when the user posts a new journey
function journeySubmit()
{
    var destination = document.getElementById("post-journey-destination").value;
    var date = document.getElementById("post-journey-date").value;
    var percentage = document.getElementById("post-journey-percentage-to-pay").value;
    var farePrice = document.getElementById("post-journey-farePrice").value;

	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	$.ajax({
        type: "POST",
        data:{destination:destination, date:date, percentageToPay:percentage, farePrice:farePrice},
        url: './post/Journey',
        success: function(output)
        {
            $('#postJourney').modal('hide');
        }
    });
}