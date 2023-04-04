<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\HomeController as FrontendHome;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Website routes
Route::get('/',[FrontendHome::class,'website'])->name('website');


// Admin panel routes

Route::group(['prefix'=>'admin'],function(){ 

Route::get('/login',[HomeController::class,'login'])->name('login');
Route::post('/dologin',[HomeController::class,'dologin'])->name('dologin');



Route::group(['middleware'=>'auth'], function(){

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

// admin
Route::get('/admin/list',[AdminController::class,'list'])->name('admin.list');
Route::get('/admin/form',[AdminController::class,'form'])->name('admin.form');
Route::post('/admin/store',[AdminController::class,'store'])->name('admin.store');
Route::get('/admin/view/{id}',[AdminController::class,'view'])->name('admin.view');
Route::get('/admin/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');



// category
Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
Route::get('/category/form',[CategoryController::class,'form'])->name('category.form');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/view{id}',[CategoryController::class,'view'])->name('category.view');
Route::get('/category/delete{id}',[CategoryController::class,'delete'])->name('category.delete');

});

});
