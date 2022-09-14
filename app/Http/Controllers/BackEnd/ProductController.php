<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\SubCategory; 
use App\Models\BackEnd\Category; 
use App\Models\BackEnd\Product; 

class ProductController extends Controller
{
    public function view(){
        $data['categories'] = Category::where('status',1)->get();
        $data['subcategories'] = SubCategory::where('status',1)->get();
        $data['products'] = Product::all();
    	return view('backend.product.view-product',$data);
    }
    public function add(){
    	$data['categories'] = Category::all();
    	$data['subcategories'] = SubCategory::all();
      	return view('backend.product.add-product',$data);
    }
    public function getSubcategory(Request $request){
    	$subcategories = SubCategory::where('category_id',$request->category_id)->where('status','1')->get();
    	return rsponse()->json($subcategories);
    }
    public function store(Request $request){
        $product                   = new Product();
        $product->name             = $request->name;
        $product->category_id      = $request->category;
        $product->sub_category_id  = $request->sub_category;
        $product->price            = $request->price;
        $product->discount_price   = $request->discount_price;
          if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/'),$filename);
            $product['image'] = $filename;
        }
        $product->status           = $request->status;
        $product->is_featured      = $request->is_featured;
        $product->description      = $request->description;
        $product->save();  
        return redirect('view-product')->with('success','data store successfully');

    }
    public function edit($id)
    {
         $editData = Product::findOrFail($id);

        $categories = Category::where('status',1)->get();
        // $subcategories = SubCategory::where('category_id',$editData->category_id)->where('status',1);
        $subcategories = SubCategory::where('status',1)->get();
        return view('backend.product.add-product',compact('editData','categories','subcategories'));
    }
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->name             = $request->name;
        $product->category_id      = $request->category;
        $product->sub_category_id  = $request->sub_category;
        $product->price            = $request->price;
        $product->discount_price   = $request->discount_price;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/'),$filename);
            $product['image'] = $filename;
        }
        else{
            unset($product['image']);
        }

        $product->status           = $request->status;
        $product->is_featured      = $request->is_featured;
        $product->description      = $request->description;
        $product->save();  
        return redirect('view-product')->with('success','data updated successfully');

    }
    public function delete($id)
    {
        $result = Product::destroy($id);
        return redirect('view-product')->with('success','data updated successfully'); 
    }
}
