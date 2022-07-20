@extends('admin/layout')
@section('page_title','Products')
@section('container')
    {{session('message')}}
	<h1 class="mb10">Products</h1>

	<a href="category/manage_category">
		<button type="button" class="btn btn-success">
			Add Product
		</button>
	</a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->product_name}}</td>
                            <td>{{$list->product_price}}</td>
                            <td><img src="{{asset('uploads/products/'.$list->product_image)}}" width="50px" height="50px" alt="image"></td>
                            <td>
                                <a href="{{url('admin/category/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>

                                <a href="{{url('admin/category/category_update/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection