<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function list(){

        $roles=Role::all();
        return view('Admin.access-control.role.list',compact('roles'));
    }


    public function form(){
        

        return view('Admin.access-control.role.form');
    }


    public function store(Request $request){

        Role::create([

            'name'=>$request->name,
            'status'=>$request->status

        ]);

        return redirect()->route('role.list');
    }


    public function edit($id){
        $roles=Role::find($id);
        return view('Admin.access-control.role.edit',compact('roles'));

    }


    public function update(Request $request, $id){

        $roles=Role::find($id);

        $roles->update([

            'name'=>$request->name,
            'status'=>$request->status

        ]);

        return redirect()->route('role.list');
    }

    public function delete($id){
        Role::find($id)->delete();
        return redirect()->route('role.list');
    }



   public function rolePermission(){

    $roles=Role::all();
    $permissions=Permission::all();

    return view('Admin.access-control.role-permission', compact('roles','permissions'));



   }

}
