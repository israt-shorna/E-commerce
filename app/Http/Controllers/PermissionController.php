<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Yajra\DataTables\Facades\DataTables;


class PermissionController extends Controller
{
    public function list(){

        return view('Admin.access-control.permission.list');
    }

    public function getPermissions()
    {
        if (request()->ajax()) {
            $data = Permission::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
