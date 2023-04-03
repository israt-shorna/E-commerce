<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function home(){

        return view ('Admin.pages.home');
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

}
