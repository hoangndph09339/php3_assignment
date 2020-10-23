@extends('admin.admin_layout.master')
@section('header', 'Profile User')
@section('content')
        <table class="table">
            <tbody>
            <tr>
                <td>
                    <th><label for="" ><i class="fas fa-user"></i>User Name: </label> </th><th><label for="">{{$user->first_name}} {{$user->last_name}}</label></th>
                </td>
            </tr>
            <tr>
                <td>
                <th><i class="fas fa-envelope"></i>Email: </th>
                <th>{{$user->email}}</th>
                </td>
            </tr>
            <tr>
                <td>
                <th><i class="fas fa-address-book"></i>Address: </th>
                <th>{{$user->address}}</th></td>
            </tr>
            <tr>
                <td>
                <th><i class="fas fa-birthday-cake"></i>Birthday: </th>
                <th>{{$user->birthday}}</th>
                </td>
            </tr>
            </tbody>
        </table>
@endsection
