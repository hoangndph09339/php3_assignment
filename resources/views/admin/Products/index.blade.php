@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_product', 'active')
@section('header', 'Product List')
@section('content')
    @can('create', User::class)
        <button type="submit" class="btn btn-primary d-block float-right"><a class="text-white"
                                                                             href="{{Route('products.create')}}">Create</a>
        </button>
    @endcan
    <table class="table">
        <thead>
        <tr>
            <th>Product Name:</th>
            <th>Category:</th>
            <th>Image:</th>
            <th>Description:</th>
            <th>Price:</th>
            <th>Sale Percent:</th>
            <th>Stock:</th>
            <th>Detail:</th>
            <th>Status:</th>
            <th>Update:</th>
            <th>Delete:</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $prd)
            <tr>
                <td>
                    <label for="">{{$prd->name}}</label>
                </td>
                @if(isset($prd->categories->name))
                    <td>{{$prd->categories->name}}</td>
                @else
                    <td class="text-warning">Null</td>
                @endif
                <td class="w-auto">
                    <img class="w-50"
                         src="{{substr($prd->image_url, 0, 4) == 'http' ? $prd->image_url : asset("$prd->image_url")}}"
                         alt="">
                </td>
                <td>
                    {{$prd->description}}
                </td>
                <td>{{$prd->price}}</td>
                <td>{{$prd->sale_percent}}</td>
                <td>{{$prd->stocks}}</td>
                <td><a href="{{route('products.show', $prd->id)}}">Show</a></td>
                <td>@can('update', $prd)
                    @if($prd->is_active == 1) Yes @else No @endif</td>
                <td>
                    <button type="submit" class="btn btn-success"><a href="{{route('products.edit',$prd->id)}}" class="text-white">Edit</a></button>
                    @endcan
                </td>
                <td>@can('delete', $prd)
                    <form action="{{route('products.destroy',$prd->id)}}" method="post">@csrf @method('delete')
                        <button type="submit" class="btn btn-warning btn-destroy">Delete</button>
                    </form>@endcan
                </td>
        @endforeach
        </tbody>
    </table>
@endsection
