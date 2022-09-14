<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Category;


class CategoryController extends Controller
{
	public function view(){
		$data['allData'] = Category::all();
		return view('backend.category.view-category',$data);
	} 
	public function add(){
		return view('backend.category.add-category');
	} 
	public function store(Request $request){
		 $request->validate([
            'name'=>'required|unique:categories',
            'status'=> 'required',
          ]);
		$category = new Category();
		$category->name = $request->name;
		$category->status = $request->status;
		$category->save();
		return redirect('view-category')->with('success','data inserted successfully');
   	} 
	public function edit($id){
		$data['editData'] = Category::find($id);
		return view('backend.category.add-category',$data);
	} 
	public function update(Request $request,$id){
    	 $request->validate([
    		'name' =>'required',
    		'status' =>'required',
    	]);
		$category =  Category::findOrFail($id);
		$category->name = $request->name;
		$category->status = $request->status;
		$category->save();
		return redirect('view-category')->with('success','data Updated successfully');
	}
	public function delete($id){
		$category = Category::destroy($id);
		return redirect('view-category')->with('success','data Updated successfully');	
	}
   
}
