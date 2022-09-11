<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;
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


Route::get('/',function (){
return view('welcome');
});
Route::get('/products',[ProductController::class,'index'])->name('product.index');
Route::get('/products/create',[ProductController::class,'create'])->name('product.create');
Route::get('/products/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('/products/store',[ProductController::class,'store'])->name('product.store');
Route::get('/products/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/products/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('product.destroy');
