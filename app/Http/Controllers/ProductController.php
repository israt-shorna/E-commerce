<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $products=Product::with('category')->get();

        return view('Admin.pages.products.list',compact('products'));
    }

    public function form(){
        $categories=Category::all();
        return view('Admin.pages.products.form',compact('categories'));
    }

    public function store(Request $request){

      

        $filename='';
        if($request->hasFile('image'))
        {
           
            $filename=date('ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')-> storeAs('/uploads', $filename);

        }
        
        Product::create([ 

        'name'=>$request->name,
        'category_id'=>$request->category_id,
        'description'=>$request->description,
        'image'=>$filename,
        'price'=>$request->price

        ]);
        return redirect()->route('products.list');


        


    }
}
