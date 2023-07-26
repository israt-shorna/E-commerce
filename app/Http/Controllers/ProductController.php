<?php

namespace App\Http\Controllers;

use App\Events\CreateProduct;
use App\Jobs\SendEmailJob;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class ProductController extends Controller
{
    public function list(){
        $products=Product::with('category')->paginate('2');

        return view('Admin.pages.products.list',compact('products'));
    }

    public function form(){
        $categories=Category::all();
        return view('Admin.pages.products.form',compact('categories'));
    }

    public function store(Request $request)
    {
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

        event(new CreateProduct("Hello from advance"));

        // $product=new Product();
        // $product->name = $request->name;
        // $product->category_id = $request->category_id;
        // $product->description = $request->description;
        // $product->image = $filename;
        // $product->price = $request->price;
        // $product->save();

        $userCollection=User::limit(10)->get();
       
        foreach($userCollection as $userObject)
        {
            dispatch(new SendEmailJob($userObject));
        }
       
       

        

        
        return redirect()->route('products.list');

    }
}
