@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_category', 'active')
@section('header', "Create Category")
@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" action="{{route('categories.store')}}" method="post"
              enctype="multipart/form-data"> @csrf
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Category Name</label>
                <div class="col-sm-9">
                    <input type="text" id="name" name="name" placeholder="Category Name"
                           class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Category*</label>
                <div class="dropdown show col-sm-9">
                    <select name="parent_id" id="parent_id" class="form-control">
                        @foreach($Category as $item)
                            <option name="parent_id" value="{{$item->id}}">{{$item->id}}</option>
                        @endforeach
                    </select></div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
@endsection
