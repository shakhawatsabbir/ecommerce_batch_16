<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

//Route::get('/', function () {return view('welcome');});
Route::get('/',[EcommerceController::class,'index'])->name('home');
Route::get('/shop.product',[EcommerceController::class,'shopProduct'])->name('shop-product');
Route::get('/detail.product/{id}',[EcommerceController::class,'singleProduct'])->name('detail-product');




Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/add-product',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/manage-product',[ProductController::class,'manageProduct'])->name('manage.product');
    Route::post('/new-product',[ProductController::class,'saveProduct'])->name('new.product');
    Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update.product');
    Route::post('/product-delete',[ProductController::class,'productDelete'])->name('product.delete');
    Route::get('/product-edit/{id}',[ProductController::class,'productEdit'])->name('product.edit');
    Route::get('/status-product/{id}',[ProductController::class,'statusProduct'])->name('status.product');

});
