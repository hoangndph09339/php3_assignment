@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_user', 'active')
@section('header', 'Users Update')
@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" action="{{route('users.update', $user->id)}}" method="post"> @csrf @method('PUT')
            <h2 class="text-center">Registration</h2>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <div class="form-group">
                <label for="first_name" class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-9">
                    <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}" placeholder="First Name" class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" id="last_name" value="{{$user->last_name}}" name="last_name" placeholder="Last Name" class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email* </label>
                <div class="col-sm-9">
                    <input type="email" id="email" value="{{$user->email}}" placeholder="Email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">Password*</label>
                <div class="col-sm-9">
                    <input type="text" id="password" value="{{$user->password}}"  name="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="address" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-9">
                    <textarea name="address" id="address" placeholder="Address" class="form-control" autofocus>{{$user->address}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Role*</label>
                <div class="dropdown show col-sm-9">
                    <select class="col-sm-9 form-control" name="is_active" value="role">
                        <option name="is_active" value="1">Yes</option>
                        <option name="is_active" value="0">Block</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Role*</label>
                <div class="dropdown show col-sm-9">
                    <select class="col-sm-9 form-control" name="role" value="role">
                        <option name="role" value="1">User</option>
                        <option name="role" value="2">Admin</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
@endsection
