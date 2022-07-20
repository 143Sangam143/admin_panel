@extends('admin/layout')
@section('page_title','Manage Category')
@section('container')

	<h1 class="mb10">Manage Category</h1>

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
                            <form action="{{route('category.manage_category_process')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="product_name" class="control-label mb-1">Product Name</label>
                                    <input id="product_name" name="product_name" type="text" class="form-control" value="{{$product_name}}" aria-required="true" aria-invalid="false" required>
                                    @error('product_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_price" class="control-label mb-1">Product Price</label>
                                    <input id="product_price" name="product_price" type="number" class="form-control" value="{{$product_price}}" aria-required="true" aria-invalid="false" required>
                                    @error('product_price')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Product image</label>
                                    <input type="file" name="product_image" class="form-control" required>
                                    @error('product_image')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>


                                
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="{{$id}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 