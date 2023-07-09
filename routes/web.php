<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\HomeController as FrontendHome;
use App\Http\Controllers\Frontend\VendorController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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

// Home routes
Route::get('/',[FrontendHome::class,'website'])->name('website');
Route::get('/product-search',[FrontendHome::class,'productSearch'])->name('product.search');
Route::get('/product-under-category/{id}',[FrontendHome::class,'productUnderCategory'])->name('product.under.category');
Route::post('/user-store',[FrontendHome::class,'userStore'])->name('user.store');
Route::post('/user-login',[FrontendHome::class,'userLogin'])->name('user.login');
Route::get('/user-logout',[FrontendHome::class,'userLogout'])->name('user.logout');
Route::get('/email-verify/{id}',[FrontendHome::class,'emailVerify'])->name('email.verify');
Route::get('/email-verify-link/{id}',[FrontendHome::class,'emailVerifyLink'])->name('email.verify.link');

// Vendors route
Route::get('/vendor/home',[VendorController::class,'vendorHome'])->name('vendor.home');
Route::post('/vendor/store',[VendorController::class,'vendorStore'])->name('vendor.store');
Route::post('/vendor/login',[VendorController::class,'vendorLogin'])->name('vendor.login');



// Admin panel routes

// Route::group(['name'=>'user'],function(){});

Route::group(['prefix'=>'admin'],function(){

    Route::get('/login',[HomeController::class,'login'])->name('login');
    Route::post('/dologin',[HomeController::class,'dologin'])->name('dologin');

    Route::group(['middleware'=>'auth'], function(){

        Route::group(['middleware'=>'checkadmin'],function(){

            Route::get('/',[HomeController::class,'home'])->name('home');
            Route::get('/logout',[HomeController::class,'logout'])->name('logout');

            // admin
            Route::get('/list',[AdminController::class,'list'])->name('admin.list');
            Route::get('/form',[AdminController::class,'form'])->name('admin.form');
            Route::post('/store',[AdminController::class,'store'])->name('admin.store');
            Route::get('/view/{id}',[AdminController::class,'view'])->name('admin.view');
            Route::get('/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');



            // category
            Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
            Route::get('/category/form',[CategoryController::class,'form'])->name('category.form');
            Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
            Route::get('/category/view{id}',[CategoryController::class,'view'])->name('category.view');
            Route::get('/category/delete{id}',[CategoryController::class,'delete'])->name('category.delete');
            Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
            Route::put('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');



            // product
            Route::get('/products/list',[ProductController::class,'list'])->name('products.list');
            Route::get('/products/form',[ProductController::class,'form'])->name('products.form');
            Route::post('/products/store',[ProductController::class,'store'])->name('products.store');

            // Access-control
            Route::get('/role/list',[RoleController::class,'list'])->name('role.list');
            Route::get('/role/form',[RoleController::class,'form'])->name('role.form');
            Route::post('/role/store',[RoleController::class,'store'])->name('role.store');
            Route::get('/role/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
            Route::put('/role/update/{id}',[RoleController::class,'update'])->name('role.update');
            Route::get('/role/delete/{id}',[RoleController::class,'delete'])->name('role.delete');


            Route::get('/permission/list',[PermissionController::class, 'list'])->name('permission.list');
            Route::get('/permission-get-data',[PermissionController::class, 'getPermissions'])->name('permission.get.data');
            Route::get('/permission/list-new',[PermissionController::class, 'list'])->name('permission.list.new');


            Route::get('/assign-permission/{role_id}',[RoleController::class, 'rolePermission'])->name('role.permission');
            Route::post('/assign-permission/{role_id}',[RoleController::class, 'assignPermission'])->name('assign.permission');



});

});

});
