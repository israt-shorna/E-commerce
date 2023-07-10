<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home(){

        $product=Product::all()->count();

        return view('Admin.pages.home',compact('product'));
    }



    public function login(){

        return view('Admin.pages.login');
    }

    public function dologin(Request $request){
        $validate=Validator::make($request->all(),[

            'password'=>'required',
            'email'=>'required|min:5'
        ]);


    

    if($validate->fails())
    {

        // toastr()->error($validate->getMessageBag());

        return redirect()-> back();
    }

    $credentials=$request->except('_token');
    if(auth()->attempt($credentials)){
    // toastr()->success('login success');
    return redirect()->route('home');
    }

    // toastr()->error('login failed');
    return redirect()->back();
    }


    public function logout(){

        auth()->logout();
        toastr()->success('logged out');
        return redirect()->route('login');

    }

    public function forgetPassword()
    {

        return view('Website.forget-password');
        
    }

   public function forgetPasswordSendLink(Request $request)
    {
       
        $validate=Validator::make($request->all(),[
            'email'=>'required|email'
        ]);

        if($validate->fails())
        {
            toastr()->error('email required.');
            return redirect()->back();
        }

        $user=User::where('email',$request->email)->first();
        if($user)
        {

            //unique link generate for reset password
                //generate token to identify user.
                $token=Str::random(40);
                
            $link=route('forget.password.reset.form',['token'=>$token]);
            $user->update([
                'remember_token'=>$token
            ]);
dd($link);
            //set time for expire
            
            
        }
        toastr()->error('User not found');
        return redirect()->back();

    }

    public function forgetPasswordResetForm(Request $request) {
       
        // dd($request->all());

        $user=User::where('remember_token',$request->token)->first();
        if($user)
        {
            $user->update([
                'remember_token'=>null
            ]);

            toastr()->success('Link valid.');
            return view('Website.reset-password');
        }

        toastr()->error('Invalid Link');

        return redirect()->route('website');
    
       
    }

}
