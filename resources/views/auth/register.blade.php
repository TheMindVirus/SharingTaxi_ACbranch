<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHARING TAXI - REGISTRATION</title>
	@include('parts.lib')
</head>

<body>
    @include('parts.navbar')

    <div style="position: relative; top: 100px; width: 100%;" class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Student Registration</b></div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form style = "display: block; text-align:center;" class="form-horizontal" role="form" method="POST" action="./auth/student/register">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class = "form-group">
                            <label class="col-md-4 control-label">Image</label>
                            <div class = "col-md-6">
                                <input type="file" id = "file" onchange = "imagePreview()" class = "form-control" name = "image"/>
                            </div>
                        </div>
                        <div class = "form-group">
                            <img   style = "margin-left:auto; margin-right:auto;" id = "image" src = "" height= "300" width = "300" alt = "image preview"/>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Student ID</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="studentId" value="{{ old('studentId') }}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Surname</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="surname" value="{{ old('surname') }}">
                            </div>
                        </div>

                        <div class = "form-group">
                            <label class = "col-md-4 control-label">Campus</label>
                            <div class = "col-md-6">
                                <input type = "text" class = "form-control" name = "campus" value = "{{old('campus')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    function imagePreview()
    {
        var image = document.getElementById('image');
        var file =   document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function(){
            //result returns the page of the
            image.src = reader.result;
        }
        if(file){
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>