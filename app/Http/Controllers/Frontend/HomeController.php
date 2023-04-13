<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function website(){

        
        

        return view('Website.pages.home');
    }

    public function productSearch(Request $request){

        $products=Product::where('name','like','%'.$request->search_key.'%')->get();
       

        return view('website.pages.product.search-list',compact('products') );


    }

    public function productUnderCategory($id){
        $categories=Category::find($id);
        $products=Product::where('category_id','=',$id)->get();

        return view('website.pages.product.products-under-category',compact('categories','products'));

    }

    public function userStore(Request $request){
        $validate=Validator::make($request->all(),[
            'customer_name'=>'required',
            'customer_email'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'


        ]);

        if($validate->fails()){
            toastr()->error('registration failed');
            return redirect()->back();
        }

        User::create([
            'name'=>$request->customer_name,
            'email'=>$request->customer_email,
            'password'=>bcrypt($request->password),
            'type'=>'customer'

        ]);
        toastr()->success('successfully registered');
        return redirect()->route('website');

    }

    public function userLogin(Request $request){
       
        $validate=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'

        ]);
        if($validate->fails()){
            toastr()->error('login failed');
            return redirect()->back();
        }

        $credentials=$request->except('_token');
        if(auth()->attempt($credentials)){

            toastr()->success('successfully logged in');
            return redirect()->route('website');
        }



    }

    public function userLogout(){

        auth()->logout();
        toastr()->warning('logged out');
        return redirect()->back();
    }

}
