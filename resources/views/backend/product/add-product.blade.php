@extends('backend.master')
@section('mainContent')
<style type="text/css">
  .ck.ck-content.ck-editor__editable{
    height: 200px;
}
</style>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
        	<div class="row">
        		<div class="col-md-8">
              <div class="card">
                  <h5 class="card-header"> 
                      @if(isset($editData)) Edit  Product Form 
                      @else
                       Add Product Form
                      @endif
                      <a href="{{route('view-product')}}" class="btn btn-primary float-right"><i class="fa fa-list"></i> Product list</a></h5>
                  <div class="card-body">
                      <form action="{{@$editData?route('update-product',$editData->id):('store-product')}}" method="POST" 
                        id="myForm" data-parsley-validate="" novalidate="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{isset($editData)?$editData->id:''}}">

                      	@csrf
                          <div class="form-group">
                              <label for="inputUserName">Product Name</label>
                              <input id="inputUserName" type="text" name="name" data-parsley-trigger="change" value="{{@$editData->name}}" placeholder="Enter Product Name" autocomplete="off" class="form-control">
                               @error('name')
                               	<span class="text-danger">{{ $message }}</span>
                          	 @enderror
                          </div>
                          <div class="form-group">
                              <label for="inputUserName">Price</label>
                              <input id="inputUserName" type="number" name="price" data-parsley-trigger="change" value="{{@$editData->price}}" placeholder="Enter Price number" autocomplete="off" class="form-control">
                               @error('price')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                          </div>
                          <div class="form-group">
                              <label for="inputUserName">Discount Price</label>
                              <input id="inputUserName" type="number" name="discount_price" data-parsley-trigger="change" value="{{@$editData->discount_price}}" placeholder="Enter discount price" autocomplete="off" class="form-control">
                               @error('discount_price')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                          </div>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control form-control-sm"><span>
                                 @if(isset($editData))
                                  <img src="{{url('uploads/'.@$editData->image)}}" height="100px" width="100px">
                                @endif
                                
                                <font style="color: red">{{($errors->has('image'))? ($errors->first('name')):''}}</font>
                            </div>
                          <div class="form-group">
                              <label for="inputUserName">Product Description</label>
                              <div id="">
                               
                                   <textarea class="form-control summernote" required="" value="" placeholder="description" type="text" name="description">{{@$editData->description}}</textarea>    
                                   @error('description')
                                   <span class="text-danger">{{ $message }}</span>
                                  @enderror
                            </div>
                          </div>
                         <div class="form-group">
                            <label for="inputUserName">Category Select</label>
                            <select name="category" class="form-select form-control form-select-lg mb-3 category" aria-label=".form-select-lg example">
                              <option value="">Select Category Name</option>
                              @foreach($categories as $category)
                                <option value="{{$category->id}}"{{(@$editData->category_id==$category->id)? 'selected':''}}>{{$category->name}}</option>
                              @endforeach
                            </select>                                                                        
                            <font style="color: red">{{($errors->has('category_id'))? ($errors->first('category_id')):''}}</font>
                          </div>
                           <div class="form-group">
                                <label for="inputUserName">Subcategory Select</label>
                                <select name="sub_category" id="subcategory-id" class="form-select form-control form-select-lg sub-category mb-3" aria-label=".form-select-lg example">
                                  <option value="">Select Subcategory Name</option>
                                  @foreach($subcategories as $subcategory)
                                     <option value="{{$subcategory->id}}"{{(@$editData->sub_category_id==$subcategory->id)? 'selected':''}}>{{$subcategory->name}}</option>
                                    
                                  @endforeach
                                 
                                </select>                                                                        
                                <font style="color: red">{{($errors->has('sub_category'))? ($errors->first('sub_category')):''}}</font>
                            </div>
                          <div class="form-group">
                              <label for="inputUserName">Featured Status?</label>
                                <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio"  value="1" checked name="is_featured" class="custom-control-input"><span class="custom-control-label"{{(@$editData->is_featured ==1?'selected':'')}}>Yes</span>
                                </label>  
                                <label class="custom-control custom-radio custom-control-inline">
                                  <input type="radio"  name="is_featured" value="0" class="custom-control-input"><span class="custom-control-label" {{(@$editData->is_featured ==0?'selected':'')}}>NO</span>
                                </label>                                
                          </div>
                          <div class="form-group">
                              <label for="inputUserName">Product Status</label>
                              <select name="status" class="form-select form-control form-select-lg sub-category mb-3" aria-label=".form-select-lg example">
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

<input type="hidden" id="url" value="{{url('/')}}">

 <script type="text/javascript">
  $(document).ready(function() {
    $('#myForm').validate({
      rules: {
        "name" : {
          required: true,
        },
        "price" : {
          required: true,
        },
        "discount_price" : {
          required: true,
        },
        "product_image" : {
          required: true,
        },
        "discount_price" : {
          required: true,
        },
        "category_id" : {
          required: true,
        },
        "subcategory_id" : {
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

<script type="text/javascript">
    $(document).ready(function(){
      $(".category").on('change',function(){

        var category_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var url = $('#url').val();
        $.ajax({
          url: url + "/product/subcategory",
          method:"POST",
          Data: {
            category_id: category_id,
            _token: _token
          },
          success: function(result){
              $('.sub-category option:not(:first)').remove();
              var options = '';
             $(result).each(function(index,value){

                options+= '<option value="'+value.id+'">'+value.name+'</option>'
             });
             $(".sub-category").append(options);
            }
        });
      });
    });
</script>

@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote();
    });
</script>
@endsection()
