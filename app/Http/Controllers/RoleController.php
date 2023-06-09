<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
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



   public function rolePermission($roleId){

    $role=Role::with('permissions')->find($roleId);

    $permissions=Permission::all();

    return view('Admin.access-control.role-permission', compact('role','permissions'));



   }


    public function assignPermission(Request $request,$roleId)
    {



        foreach ($request->selected_permissions as $permission)
        {
            RolePermission::create([
                'role_id'=>$roleId,
                'permission_id'=>$permission
            ]);
        }

        return redirect()->back();

   }

}
