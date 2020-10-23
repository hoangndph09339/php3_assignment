@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_category', 'active')
@section('header', 'Category List')
@section('content')
    @can('create', User::class)
        <button type="submit" class="btn btn-primary d-block float-right"><a class="text-white"
                                                                             href="{{Route('categories.create')}}">Create</a>
        </button>
    @endcan
    <table class="table">
        <thead>
        <tr>
            <th>Cate Name:</th>
            <th>Parent ID:</th>
            <th>Update:</th>
            <th>Delete:</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $cate)
            <tr>
                <td>
                    <label for="">{{$cate->name}}</label>
                </td>
                <td>
                    {{$cate->parent_id}}
                </td>
                <td>
                    <button type="submit" class="btn btn-success"><a href="{{route('categories.edit', $cate->id)}}" class="text-white">Edit</a></button>
                </td>
                <td>
                    <form action="{{Route('categories.destroy',$cate->id)}}" method="post"> @csrf @method('delete')
                        <button type="submit" class="btn btn-warning btn-destroy">Delete</button>
                    </form>
                </td>
        @endforeach
        </tbody>
    </table>
@endsection
