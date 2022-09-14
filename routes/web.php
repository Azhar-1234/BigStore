<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\SubCategoryController;
use App\Http\Controllers\BackEnd\ProductController;
use App\Http\Controllers\fontEnd\SiteController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[SiteController::class,'index'])->name('index');

Route::get('product-details',function(){
	return view('fontend.product-details');
});
Auth::routes();
Route::get('dashboard', function () {
    return view('backend.pages.home');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//category
Route::get('/view-category', [CategoryController::class,'view'])->name('view-category');
Route::get('/add-category', [CategoryController::class,'add'])->name('add-category');
Route::post('/store-category', [CategoryController::class,'store'])->name('store-category');
Route::get('/edit-category/{id}', [CategoryController::class,'edit'])->name('edit-category');
Route::post('/update-category/{id}', [CategoryController::class,'update'])->name('update-category');
Route::get('/delete-category/{id}', [CategoryController::class,'delete'])->name('delete-category');
//subcategory
Route::get('/view-sub-category', [SubCategoryController::class,'view'])->name('view-sub-category');
Route::get('/add-sub-category', [SubCategoryController::class,'add'])->name('add-sub-category');
Route::post('/store-sub-category', [SubCategoryController::class,'store'])->name('store-sub-category');
Route::get('/edit-sub-category/{id}', [SubCategoryController::class,'edit'])->name('edit-sub-category');
Route::post('/update-sub-category/{id}', [SubCategoryController::class,'update'])->name('update-sub-category');
Route::get('/delete-sub-category/{id}', [SubCategoryController::class,'delete'])->name('delete-sub-category');
//product
Route::get('/view-product', [ProductController::class,'view'])->name('view-product');
Route::get('/add-product', [ProductController::class,'add'])->name('add-product');
Route::post('/store-product', [ProductController::class,'store'])->name('store-product');
Route::get('/edit-product/{id}', [ProductController::class,'edit'])->name('edit-product');
Route::post('/update-product/{id}', [ProductController::class,'update'])->name('update-product');
Route::get('/delete-product/{id}', [ProductController::class,'delete'])->name('delete-product');

Route::post('/product/subcategory', [ProductController::class,'getSubcategory']);

