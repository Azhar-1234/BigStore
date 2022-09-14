@extends('backend.master')
@section('mainContent')
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"> 
                        @if(isset($subCategory)) Edit  Sub Category Form 
                        @else
                         Add Sub Category Form
                        @endif
                        <a href="{{route('view-sub-category')}}" class="btn btn-primary float-right"><i class="fa fa-list"></i> SubCategory list</a>
                    </h5>
                    <div class="card-body">
                        <form action="{{@$subCategory?route('update-sub-category',$subCategory->id):('store-sub-category')}}" method="POST" id="myForm" data-parsley-validate="" novalidate="">
                          @csrf
                            <div class="form-group">
                                <label for="inputUserName">Sub Category Name</label>
                                <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" value="{{@$subCategory->name}}" placeholder="Enter Subcategory Name" autocomplete="off" class="form-control">                                    
                              <font style="color: red">{{($errors->has('name'))? ($errors->first('name')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Status Select</label>
                                <select name="status" class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                  <option value="">status Select</option>
                                  <option value="1"{{(@$subCategory->status ==1?'selected':'')}}>Active</option>
                                  <option value="0"{{(@$subCategory->status ==0?'selected':'')}}>Inactive</option>
                                </select>                                    
                                <font style="color: red">{{($errors->has('status'))? ($errors->first('status')):''}}</font>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Category Select</label>
                                <select name="category_id" class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                                  <option value="">Select Category Name</option>
                                  @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{(@$subCategory->category_id==$category->id)? 'selected':''}}>{{$category->name}}</option>
                                  @endforeach
                                </select>                                                                        
                                <font style="color: red">{{($errors->has('category_id'))? ($errors->first('category_id')):''}}</font>
                            </div>
                            <div class="row">
                                <div class="col-sm pl-0">
                                    <p class="text-center">
                                        <button type="submit" class="btn btn-space btn-primary"> {{@$subCategory?'Update':'Submit'}}</button>
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
