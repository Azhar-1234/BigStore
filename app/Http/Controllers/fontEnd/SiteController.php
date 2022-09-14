<?php

namespace App\Http\Controllers\fontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Product;
class SiteController extends Controller
{
    public function index(){
    	$data['featured_products'] =  Product::where('is_featured',1)->where('status',1)->limit('4')->get();
    	$data['latest_products']  = Product::where('id','DESC')->where('status',1)->get();
    	return view('frontend.home',$data);
    }
}
