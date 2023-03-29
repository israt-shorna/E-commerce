<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list(){
        $admins = Admin::paginate(4);

        return view ('Admin.pages.admin.list',compact('admins'));
    }



    public function form(){


        return view('Admin.pages.admin.form');
    }


    public function store(Request $request)
    {

        
        Admin::create([

            'name'=>$request->admin_name,
            'mobile_number'=>$request->contact,
            
        ]);
        return redirect()->back();


    }


    public function view($id){
        $admin=Admin::find($id);
        return view('Admin.pages.admin.view',compact('admin'));
    }


    public function delete($id){
        Admin::find($id)->delete();
        return redirect()->back();


    }
}
