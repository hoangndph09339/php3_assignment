@php
    use App\Models\Product;
    use App\Models\User;
@endphp
@extends('admin.admin_layout.master')
@section('active_product', 'active')
@section('header', "Product $product->name Detail")
@section('content')
    <div class="row ml-5 h3">
        <div class="col"><p class="row">Image:</p>
            <div class="row"><img class="w-100"
                                  src="{{substr($product->image_url, 0, 4) == 'http' ? $product->image_url : asset("$product->image_url")}}"
                                  alt=""></div>
        </div>
        <div class="ml-5 col text-left h3">
            <div class="row mb-5">
                <div class="col-3">Product Name:</div>
                <div class="col-8">{{$product->name}}</div>
            </div>
            <div class="row mb-5">
                <div class="col-3">Category:</div>
                <div class="col-8">
                    @if(isset($product->categories->name))
                        {{$product->categories->name}}
                    @else
                        <label class="text-warning">Null</label>
                    @endif</div>
            </div>
            <div class="row mb-5">
                <div class="col-3">Description:</div>
                <div class="col-8">{{$product->description}}</div>
            </div>
            <div class="row mb-5">
                <div class="col-3">Price:</div>
                <div class="col-8">{{$product->price}}</div>
            </div>
            <div class="row mb-5">
                <div class="col-3">Sale Percent:</div>
                <div class="col-8">{{$product->sale_percent}}</div>
            </div>
            <div class="row mb-5">
                <div class="col-3">Stock:</div>
                <div class="col-8">{{$product->stocks}}</div>
            </div>
            @can('update', $product)
                <div class="row mb-5">
                    <div class="col-3">Status:</div>
                    <div class="col-8">@if($product->is_active == 1) Yes @else No @endif</div>
                </div>
                <div class="row mb-5">
                    <div class="col-3">Update:</div>
                    <div class="col-8">
                        <button type="submit" class="btn btn-success"><a href="{{route('products.edit',$product->id)}}"
                                                                         class="text-white">Edit</a>
                        </button>
                    </div>
                </div>@endcan
            @can('delete', $product)
                <div class="row">
                    <div class="col-3">Delete:</div>
                    <div class="col-8">
                        <form action="{{route('products.destroy',$product->id)}}" method="post">@csrf @method('delete')
                            <button type="submit" class="btn btn-warning btn-destroy">Delete</button>
                        </form>
                    </div>
                </div>@endcan
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered table-hover mt-4 text-center">
            <thead>
            <tr>
                <th>Comment:</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $cmt)
                <tr>
                    <td>{{$cmt->content}}</td>
                    @can('delete',$cmt)
                        <td>
                            <form action="{{route('comments.destroy', $cmt->id)}}" method="POST" class="mt-2">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-warning btn-destroy">Delete</button>
                            </form>
                        </td>@endcan
                    @can('update', $cmt)
                        <td>
                            <button type="submit" class="btn btn-success"><a href="{{route('comments.edit', $cmt->id)}}"
                                                                             class="text-white">Edit</a></button>
                        </td>@endcan
                </tr>
            @endforeach
            </tbody>
        </table>
        <form action="{{route('comments.store')}}" method="post">@csrf
            <div><textarea name="content" id="" class="w-auto" cols="200" rows="10"></textarea></div>
            <input type="text" name="user_id" hidden value="{{Auth::User()->id}}">
            <input type="text" name="product_id" hidden value="{{$product->id}}">
            <button type="submit" class="btn btn-primary mt-2">Comment</button>
        </form>
    </div>
@endsection
