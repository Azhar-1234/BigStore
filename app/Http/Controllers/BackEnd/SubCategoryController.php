<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Category;
use App\Models\BackEnd\SubCategory;


class SubCategoryController extends Controller
{
	public function view(){
		 $data['allData'] = SubCategory::all();
		return view('backend.sub-category.view-sub-category',$data);
	}
	public function add(){
		$data['categories'] = Category::all();
	 return view('backend.sub-category.add-sub-category',$data);
	}
	public function store(Request $request){
    	 $request->validate([
    		'name'=>'required|max:100|unique:sub_categories,name',
       		'status' =>'required',
       		'category_id' =>'required'
    	]);
		$sub_category = new SubCategory();
		$sub_category->name = $request->name;
		$sub_category->status = $request->status;		
		$sub_category->category_id = $request->category_id;
		$sub_category->save();
	 return redirect('view-sub-category')->with('success','data is stored');
	}
	public function edit($id){
		$data['subCategory'] = SubCategory::find($id);
	 	$data['categories'] = Category::all();
		return view('backend.sub-category.add-sub-category',$data);
	}
	public function update(Request $request){
    	 $request->validate([
    		'name'=>'required|max:100|unique:sub_categories,name,'.$request->id,
       		'status' =>'required',
       		'category_id' =>'required'
    	]);
		$sub_category = SubCategory::findOrFail($request->id);
		$sub_category->name = $request->name;
		$sub_category->status = $request->status;		
		$sub_category->category_id = $request->category_id;
		$sub_category->save();
	 	return redirect('view-sub-category')->with('success','data is updated');
	}
	public function delete($id){
		$sub_category = SubCategory::destroy($id);
	 	return redirect('view-sub-category')->with('success','data is deleted');
	}
	
}
