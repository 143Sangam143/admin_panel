@extends('admin/layout')
@section('page_title','Category Update')
@section('container')

    <h1 class="mb10">Category Update</h1>

    <a href="{{url('admin/category')}}">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('admin/category/category_update/'.$result->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="product_name" class="control-label mb-1">Product Name</label>
                                    <input id="product_name" name="product_name" type="text" class="form-control" value="{{$result->product_name}}" aria-required="true" aria-invalid="false" required>
                                    @error('product_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_price" class="control-label mb-1">Product Price</label>
                                    <input id="product_price" name="product_price" type="number" class="form-control" value="{{$result->product_price}}" aria-required="true" aria-invalid="false" required>
                                    <!-- @error('product_price')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror -->
                                </div>

                                <div class="form-group">
                                    <label for="">Product image</label>
                                    <input type="file" name="product_image" class="form-control" required>
                                    <img src="{{asset('uploads/products/'.$result->product_image)}}" width="50px" height="50px" alt="image">
                                    @error('product_image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Update
                                    </button>
                                </div>

                                <!-- <div>
                                    <a href="{{url('admin/category')}}"><button type="button" class="btn btn-success">Update</button></a>
                                </div> -->
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 