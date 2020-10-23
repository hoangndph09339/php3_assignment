@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_user', 'active')
@section('header', 'Users Create')
@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" action="{{route('users.store')}}" method="post"> @csrf
            <h2 class="text-center">Registration</h2>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <div class="form-group">
                <label for="first_name" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control" autofocus>
                    <span class="text-danger">@error('first_name'){{$message}} @enderror</span>
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control" autofocus>
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
                    <input type="password" id="password"  name="password" placeholder="Password" class="form-control">
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
                    <textarea name="address" id="address" placeholder="Address" class="form-control" autofocus></textarea>
                    <span class="text-danger">@error('address'){{$message}} @enderror</span>
                </div>
            </div>
            <div class="form-group">
                <label for="birthday" class="col-sm-3 control-label">Date of Birth*</label>
                <div class="col-sm-9">
                    <input type="date" name="birthday" id="birthday" class="form-control">
                    <span class="text-danger">@error('birthday'){{$message}} @enderror</span>
                </div>
            </div>
            <input type="text" name="is_active" value="1" hidden class="hidden form-control">
            <div class="form-group">
                <label class="col-sm-3 control-label">Role*</label>
                <div class="dropdown show col-sm-9">
                    <select class="col-sm-9 form-control" name="role" value="role">
                        <option name="role">1</option>
                        <option name="role">2</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
@endsection
