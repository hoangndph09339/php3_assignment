@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_comment', 'active')
@section('header', "Update Comment")
@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" action="{{route('comments.update',$comment->id)}}" method="post"
              enctype="multipart/form-data"> @csrf @method('PUT')
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">User Name</label>
                <div class="col-sm-9">
                    <label type="text" id="name" name="name" placeholder="Product Name"
                           class="form-control"
                           autofocus>{{$comment->user->first_name }} {{$comment->user->last_name}}</label>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Product Name</label>
                <div class="col-sm-9">
                    <label type="text" id="name" name="name" placeholder="Product Name"
                           class="form-control" autofocus>{{$comment->product->name }}</label>
                    <input type="text" name="product_id" value="{{$comment->product_id}}" hidden id="">
                </div>
            </div>
            <div class="">
                <div class="input-group-prepend col-sm-3 control-label">
                    <label class="input-group-text" id="inputGroupFileAddon01">Product Image</label>
                </div>
                <div class="form-group">
                    <img class="w-25"
                         src="{{substr($comment->product->image_url, 0, 4) == 'http' ? $comment->product->image_url : asset($comment->product->image_url)}}"
                         alt="">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Content</label>
                <div class="col-sm-9">
                    <textarea name="content" id="description"
                              placeholder="Description" class="form-control" autofocus>{{$comment->content}}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
@endsection
