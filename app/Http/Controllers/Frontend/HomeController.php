<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AccountVerificationEmail;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function emailVerify($id){

        $user=User::find($id);
        $link=route('email.verify.link',$user->id);

        Mail::to($user->email)->send(new AccountVerificationEmail($link));

        $user->update([
                'expired_at'=>Carbon::now()->addMinute(5)
        ]);

        toastr()->success('Verification link sent to your email.');
        return redirect()->back();
    }


    public function emailVerifyLink($id)
    {
        $user=User::find($id);

        if($user->expired_at > Carbon::now())
        {
            $user->update([
                'email_verified_at'=>now()
            ]);
            toastr()->success('Email verification success.Please login.');
            return redirect()->route('login');
        }

//        dd($user);
        toastr()->warning('Link expired');
        return redirect()->route('login');
    }

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

    public function userStore(Request $request)
    {

        $validate=Validator::make($request->all(),[
            'customer_name'=>'required',
            'customer_email'=>'required|unique:users,email',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);


        if($validate->fails()){
            toastr()->error('Something went wrong.');
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
            toastr()->error($validate->getMessageBag());
            return redirect()->back();
        }

        $credentials=$request->except('_token');
        if(auth()->attempt($credentials)){
            if(auth()->user()->email_verified_at!=null)
            {
                toastr()->success('successfully logged in');
                return redirect()->route('website');
            }

            $user_id=auth()->user()->id;

            Auth::logout();

            toastr()->warning('Email not verified.');
            return redirect()->back()->with('userId',$user_id);

        }
        toastr()->error('Invalid Credentials.');
        return redirect()->back();


    }

    public function userLogout(){

        auth()->logout();
        toastr()->warning('logged out');
        return redirect()->back();
    }

}
