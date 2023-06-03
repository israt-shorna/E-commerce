<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function list(){
        $admins = User::where('type','=','admin')->paginate(4);

        return view ('Admin.pages.admin.list',compact('admins'));
    }



    public function form(){


        return view('Admin.pages.admin.form');
    }




    public function store(Request $request)
    {


        $validate=Validator::make($request->all(),[


          'admin_name'=>'required',
          'admin_email'=>'required',
          'password'=>'required|min:5',
          

        ]);

        if ($validate-> fails()){
            toastr()->error($validate->getMessageBag());
            return redirect()->back();

        }

      
        User::create([

            'name'=>$request->admin_name,
           
            'email'=>$request->admin_email,
            'password'=>bcrypt($request->password),
            'type'=>'admin'
            
        ]);
        




            toastr()->success('Admin created successfully!');
            return redirect()->back();
    



     


        
       


        
      


    }


    public function view($id){
        $admin=User::find($id);
        return view('Admin.pages.admin.view',compact('admin'));
    }


    public function delete($id){
        User::find($id)->delete();
        return redirect()->back();


    }
}
    
