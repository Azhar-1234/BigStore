@extends('backend.master')
@section('mainContent')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
        	<div class="row">
        		<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header"> 
                            @if(isset($editData)) Edit  Category Form 
                            @else
                             Add Category Form
                            @endif
                            <a href="{{route('view-category')}}" class="btn btn-primary float-right"><i class="fa fa-list"></i> Category list</a></h5>
                        <div class="card-body">
                            <form action="{{@$editData?route('update-category',$editData->id):('store-category')}}" method="POST" id="myForm" data-parsley-validate="" novalidate="">
                            	@csrf
                                <div class="form-group">
                                    <label for="inputUserName">Category Name</label>
                                    <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" value="{{@$editData->name}}" placeholder="Enter Category Name" autocomplete="off" class="form-control">
                                     @error('name')
                                     	<span class="text-danger">{{ $message }}</span>
                                	 @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputUserName">Category Name</label>
                                    <select name="status" class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                      <option value="">status Select</option>
                                      <option value="1"{{(@$editData->status ==1?'selected':'')}}>Active</option>
                                      <option value="0"{{(@$editData->status ==0?'selected':'')}}>Inactive</option>
                                    </select>
                                     @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm pl-0">
                                        <p class="text-center">
                                            <button type="submit" class="btn btn-space btn-primary"> {{@$editData?'Update':'Submit'}}</button>
                                            <button type="reset" class="btn btn-space btn-secondary">reset</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
 <script type="text/javascript">
    $(document).ready(function() {
      $('#myForm').validate({
        rules: {
          "name" : {
            required: true,
          },
          "status" : {
            required: true,
          }, 
        },
        messages : {

        },
        errorElement: 'span',
          errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }

      });
    });
 </script>

@endsection
