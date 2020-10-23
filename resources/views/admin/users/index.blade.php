@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_user', 'active')
@section('header', 'Users List')
@section('content')
    @can('create', User::class)
        <button type="submit" class="btn btn-primary d-block float-right"><a class="text-white"
                                                                             href="{{Route('users.create')}}">Create</a>
        </button>
    @endcan
    <table class="table">
        <thead>
        <tr>
            <th>User Name:</th>
            <th>Email:</th>
            <th>Address:</th>
            <th>Birthday:</th>
            <th>Status:</th>
            <th>Update:</th>
            <th>Delete:</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $us)
            <f>
                <td>
                    <label for="">{{$us->first_name}} {{$us->last_name}}</label>
                </td>
                <td>
                    {{$us->email}}
                </td>
                <td>{{$us->address}}</td>
                <td>{{$us->birthday}}</td>
                <td>@if($us->is_active == 1) Yes @else Block @endif</td>
                <td>
                    @can('update', $us)
                        <button type="submit" class="btn btn-success"><a href="{{route('users.edit', $us->id)}}" class="text-white">Edit</a>
                        </button>
                    @endcan
                </td>
                @can('delete', $us)
                    <td>
                        <form action="{{Route('users.destroy',$us->id)}}" method="post"> @csrf @method('delete')
                            <button type="submit" class="btn btn-warning btn-destroy">Delete</button>
                        </form>
                    </td>
                    @endcan
                    </tr>
        @endforeach
        </tbody>
    </table>
@endsection
