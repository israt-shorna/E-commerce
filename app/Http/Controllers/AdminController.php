<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function list(){
       

        // Cache::forget('users');
        if(Cache::has('users')){
            $admins=Cache::get('users');
            $mg="data from cache";
        }else{
            $admins = User::where('type','=','admin')->paginate(100);
            Cache::put('users',$admins);
            $mg="data from database";
        }

    

        return view('Admin.pages.admin.list',compact('admins','mg'));
    }

    public function form(){
        return view('Admin.pages.admin.form');
    }


    public function store(Request $request)
    {
        Log::debug('Starting user store.');

        $validate=Validator::make($request->all(),[
          'first_name'=>'required',
          'last_name'=>'required',
          'admin_email'=>'required|email',
          'password'=>'required|min:5',
        ]);
       
        if ($validate-> fails()){
            Log::debug('Validation failed.'.json_encode($validate->getMessageBag(),true));
            toastr()->error('Validation failed.');
            return redirect()->back();
        }
       
        Log::debug('Validation pass.');

        $user=User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->admin_email,
            'password'=>bcrypt($request->password),
            'type'=>'admin'

        ]);
        Log::debug('user store success. Name is : '.$user->first_name);
            toastr()->success('Admin created successfully!');
            return redirect()->back();
    }


    public function view($id){
        $admin=User::find($id);
        return view('Admin.pages.admin.view',compact('admin'));
    }


    public function verify($id){
        $admin=User::find($id);
        $admin->update([
           'email_verified_at'=>now()
        ]);
        return view('Admin.pages.admin.view',compact('admin'));
    }


    public function delete($id){
        User::find($id)->delete();
        return redirect()->back();
    }
}

