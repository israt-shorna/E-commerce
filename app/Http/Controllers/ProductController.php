<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){

        return view('Admin.pages.products.list');
    }

    public function form(){
        return view('Admin.pages.products.form');
    }

    public function store(Request $request){

        Product::create([ 

        'name'=>$request->name,
        'description'=>$request->description

        ]);
        return view('Admin.pages.products.list');


        


    }
}
