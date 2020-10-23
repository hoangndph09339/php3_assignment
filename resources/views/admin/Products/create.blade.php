@php use App\Models\User; @endphp
@extends('admin.admin_layout.master')
@section('active_product', 'active')
@section('header', 'Product Create')
@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" action="{{route('products.store')}}" method="post" enctype="multipart/form-data"> @csrf
            <h2 class="text-center">Registration</h2>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    <span class="help-block">*Required fields</span>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Product Name</label>
                <div class="col-sm-9">
                    <input type="text" id="name" name="name" placeholder="Product Name" class="form-control" autofocus>
                </div>
            </div>

            <div class="form-group">
                <select name="category_id" id="category_id">
                    @foreach($cate as $item)
                        <option name="category_id" value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image_url" class="custom-file-input" id="inputGroupFile01"
                               aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" id="description" placeholder="Description" class="form-control" autofocus></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-sm-3 control-label">Price*</label>
                <div class="col-sm-9">
                    <input type="number" min="0" name="price" id="price" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="sale_percent" class="col-sm-3 control-label">Sale Percent*</label>
                <div class="col-sm-9">
                    <input type="number" name="sale_percent" id="sale_percent" min="0" max="100" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="stocks" class="col-sm-3 control-label">Stocks*</label>
                <div class="col-sm-9">
                    <input type="number" name="stocks" id="stocks" min="0" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Status*</label>
                <div class="dropdown show col-sm-9">
                    <select class="col-sm-9 form-control" name="is_active" value="is_active">
                        <option name="is_active" value="1">Yes</option>
                        <option name="is_active" value="0is_active">No</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </form> <!-- /form -->
    </div> <!-- ./container -->
@endsection
