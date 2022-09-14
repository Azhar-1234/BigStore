@extends('backend.master')
@section('mainContent')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
        	<div class="row">
				<div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-12">
				    <div class="card">
				        <h5 class="card-header">Product Mangment <a href="{{route('add-product')}}" class="btn btn-primary float-right">add product</a></h5>
				     </div>			     
				     <div class="card-body">
			            <table class="table text-center">
			                <thead>
			                    <tr>
			                        <th scope="col">#</th>
			                        <th scope="col">Product Name</th>
			                        <th scope="col">Image</th>
			                        <th scope="col">Category(sub-category)</th>
			                        <th scope="col">Price(discount)</th>
			                        <th scope="col">Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	@foreach($products as $key=> $product)
			                    <tr class="table-primary">
				                   <th scope="row">{{++$key}}</th>
				                   <td>{{$product->name}}</td>
				                   <td>
				                   		<img src="{{url('uploads/'.$product->image)}}" height="100px" width="100px">
				                   </td>
				                   <td>
				                   		{{$product->subcategory->name}}
				                   </td>
				                   <td>{{$product->price}} ({{$product->discount_price}})</td>
				                   <td>
			                        	<a href="{{route('edit-product',$product->id)}}" class="btn btn-warning" title="edit category"><i class="fa fa-edit"></i></a>
			                        	<a href="{{route('delete-product',$product->id)}}" onclick="return confirm('are you sure')" class="btn btn-danger" title="delete category"><i class="fa fa-trash"></i></a>
			                       	</td>
			                    </tr>
			                   @endforeach
			                </tbody>
			            </table>
				     </div>
				</div>				    
			</div>
		</div>
	</div>
</div>


@endsection
