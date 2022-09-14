@extends('backend.master')
@section('mainContent')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
        	<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				    <div class="card">
				        <h5 class="card-header">Subcategory Mangment <a href="{{route('add-sub-category')}}" class="btn btn-primary float-right">add  subcategory</a></h5>
				        <div class="card-body">
				            <table class="table text-center">
				                <thead>
				                    <tr>
				                        <th scope="col">#</th>
				                        <th scope="col">Subcategory Name</th>
				                        <th scope="col">Active Status</th>
				                        <th scope="col">Category Name</th>
				                        <th scope="col">Action</th>
				                    </tr>
				                </thead>
				                <tbody>
				                	@foreach($allData as $key=> $data)
				                    <tr class="table-primary">
					                   <th scope="row">{{++$key}}</th>
					                   <td>{{$data->name}}</td>
					                    @if($data->status == 1)
					                  	 <td><button class="btn btn-success">active</button></td>
					                    @else					                  
					                    <td><button class="btn btn-info">inactive</button></td>
					                   @endif
					                   <td>{{$data->category->name}}</td>
					                   <td>
				                         	<a href="{{route('edit-sub-category',$data->id)}}" class="btn btn-warning" title="edit sub category"><i class="fa fa-edit"></i></a>
				                        	<a href="{{route('delete-sub-category',$data->id)}}" onclick="return confirm('are you sure')" class="btn btn-danger" title="delete Subcategory"><i class="fa fa-trash"></i></a>
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
</div>


@endsection
