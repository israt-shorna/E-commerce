<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\auth;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    public function vendorHome(){
        return view('Website.pages.vendor.home');
    }

    public function vendorStore(Request $request){

        $validate=Validator::make($request->all(),[
            'name'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'email'=>'required',
            'bank'=>'required',
            'city'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'


        ]);

        if($validate->fails()){
            toastr()->error('registration failed');
            return redirect()->back();
        }

        $fileName="";
        if($request->hasFile('image')){
            $fileName=date('ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        Vendor::create([
          
            'name'=>$request->name,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'email'=>$request->email,
            'bank'=>$request->bank,
            'city'=>$request->city,
            'image'=>$fileName,
            'password'=>bcrypt($request->password)

        ]);


        toastr()->success('Vendor  registered successfully');
        return redirect()->back();




    }


    public function vendorLogin(Request $request)

    
    {
       
        $validate=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'

        ]);
        if($validate->fails()){
            toastr()->error('login failed');
            return redirect()->back();
        }

        $credentials=$request->except('_token');
        if(auth('vendor')->attempt($credentials)){

            toastr()->success('successfully logged in');
            return redirect()->back();
        }

        toastr()->error('login failed');
        return redirect()->back();



    }

    
}
