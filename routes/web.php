<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'home'])->name('home');

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
Route::get('/category/view',[CategoryController::class,'view'])->name('category.view');


