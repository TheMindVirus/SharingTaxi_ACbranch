/**
 * Created by Emmanuel Audu on 22/03/2016.
 * Edited by Alastair Cota on 08/04/2016.
 */
//Description: This file contains the functions for the users requests

//Load the user's request notifications
function requestFetch(studentId)
{
    //Send the user id with the ajax request
    $.ajax({
        type: "GET",
        data: {studentId:studentId, _token: '{{csrf_token()}}' },
        url: './request/Fetch',
        success: function(output)
		{
            //Decode the notifications array from the server
            var results = JSON.parse(output);
            var postHTML = "";
            var n = 0;

            //Iterate for every post
            for(var post in results)
            {
                ++n;
                
                //Get fields from the database
                var studentID = results[post]['studentId'];
                var destination = results[post]['destination'];
                var status = results[post]['requestStatus'];
                var postId = results[post]['postId'];

				//HTML Injection: generate a box
                postHTML += "<div class='notif-post'><div class='photo'>";
				
                postHTML += "<p>"+studentId+ "</p>"+"<p>"+ destination +"<p>";

                var value = "";
                var classes = "";
                //figure out the class and the value of the button from the request status
                if(status == 0 )
                {
                    classes = "btn btn-warning";
                    value =   "Requested";
                }
                else if(status == 1)
                {
                    classes = "btn btn-success";
                    value = "ACCEPTED";
                }
                else if(status == 2)
                {
                    classes = "btn btn-danger";
                    value = "REJECTED";
                }
                //Add buttons to the notification box
                postHTML += "<input type='button' id = '"+postId+"' class=' "+ classes + "' value='"+ value +"' style='position:relative; margin-top: -15px;'>"
                    +"  "
                    +"</div><br>";
            }
            //Check if there are no notifications
            if(n > 0)
            {
                document.getElementById("notifPosts").innerHTML = postHTML;
            }
            else
            {
                document.getElementById("notifPosts").innerHTML = "You haven't created any posts.";
            }
        }
    });
}

//Create a request for a journey post
function requestJourney(postId, studentId)
{
    var btn = document.getElementById('requestButton');
    $.ajax({
        type: "POST",
        data: {postId: postId, studentId: studentId, _token: '{{csrf_token()}}' },
        url: './request/Journey',
        success: function(output)
		{
            if(output == "success")
            {
                btn.innerHTML = "Requested";
                btn.className = "btn btn-danger";
            }
            else if(output == "deleted")
            {
                btn.innerHTML = "Request";
                btn.className = "btn btn-primary"
            }
        }
    });
}

//Accept a request for a post
function requestAccept(postId, studentId)
{
    $.ajax({
        type: "GET",
        data:{studentId:studentId, postId:postId,_token:'{{csrf_token()}}'},
        url: './request/Accept',
        success: function(output)
        {
            document.getElementById("notif-post-accept-" + postId).remove();
            document.getElementById("notif-post-reject-" + postId).remove();
            document.getElementById("notif-post-" + postId).innerHTML += "<p class='label label-success'>Accepted</p>";
        }
    });
}

//Reject a request for a post
function requestReject(postId, studentId)
{
    $.ajax({
        type: "GET",
        data:{studentId:studentId, postId:postId,_token:'{{csrf_token()}}'},
        url: './request/Reject',
        success: function(output)
        {
            document.getElementById("notif-post-accept-" + postId).remove();
            document.getElementById("notif-post-reject-" + postId).remove();
            document.getElementById("notif-post-" + postId).innerHTML += "<p class='label label-danger'>Rejected</p>";
        }
    });
}