<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Register</title>
</head>
<body>

<div class="container">
    <form class="form-horizontal" role="form" action="{{route('users.store')}}" method="post">@csrf
        <h2 class="text-center">Registration</h2>
        <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3">
                <span class="help-block">*Required fields</span>
            </div>
        </div>
        <div class="form-group">
            <label for="firstName" class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-9">
                <input type="text" name="first_name" placeholder="First Name" class="form-control" autofocus>
                <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
            </div>
        </div>
        <div class="form-group">
            <label for="lastName" class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-9">
                <input type="text" name="last_name" placeholder="Last Name" class="form-control" autofocus>
                <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email* </label>
            <div class="col-sm-9">
                <input type="email" id="email" placeholder="Email" class="form-control" name="email">
                <span class="text-danger">@error('email'){{$message}} @enderror</span>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password*</label>
            <div class="col-sm-9">
                <input type="password" name="password" placeholder="Password" class="form-control">
                <span class="text-danger">@error('password'){{$message}} @enderror</span>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
            <div class="col-sm-9">
                <input type="password" name="cfpassword" placeholder="confirmPassword" class="form-control">
                <span class="text-danger">@error('cfpassword'){{$message}} @enderror</span>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-9">
                <textarea name="address" placeholder="Address" class="form-control" autofocus></textarea>
                <span class="text-danger">@error('address'){{$message}} @enderror</span>
            </div>
        </div>
        <div class="form-group">
            <label for="birthDay" class="col-sm-3 control-label">Date of Birth*</label>
            <div class="col-sm-9">
                <input type="date" name="birthday" class="form-control">
                <span class="text-danger">@error('birthday'){{$message}} @enderror</span>
            </div>
        </div>
        <input type="text" name="is_active" value="1" hidden class="hidden form-control">
        <input type="number" name="role" value="1" placeholder="Please write your height in centimetres" hidden
               class="form-control">
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form> <!-- /form -->
</div> <!-- ./container -->
</body>
</html>
