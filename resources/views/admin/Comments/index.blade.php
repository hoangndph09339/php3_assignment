@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_comment', 'active')
@section('header', 'Comment List')
@section('content')
    @can('viewAny', User::class)
    <table class="table table-bordered table-hover mb-4 text-center">
        <thead>
        <tr>
            <th>Comment By</th>
            <th>In Product</th>
            <th>Content</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $cmt)
            <tr>
                <td>{{$cmt->user->first_name}} {{$cmt->user->last_name}}</td>
                <td>{{$cmt->product->name}}</td>
                <td>{{$cmt->content}}</td>
                <td>
                    <form action="{{route('comments.destroy', $cmt->id)}}" method="POST" class="mt-2">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-warning btn-destroy">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>@endcan
    <h2>My Comment</h2>
    <table class="table table-bordered table-hover mb-4 text-center">
        <thead>
        <tr>
            <th>In Product:</th>
            <th>Content:</th>
            <th>Delete:</th>
            <th>Edit:</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $cmt)
            <tr>
                <td>{{$cmt->product->name}}</td>
                <td>{{$cmt->content}}</td>
                <td>
                    <form action="{{route('comments.destroy', $cmt->id)}}" method="POST" class="mt-2">
                        @csrf @method('delete')
                        <button type="submit" class="btn btn-warning btn-destroy">Delete</button>
                    </form>
                </td>
                <td>
                    <button type="submit" class="btn btn-success"><a href="{{route('comments.edit', $cmt->id)}}" class="text-white">Edit</a></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
