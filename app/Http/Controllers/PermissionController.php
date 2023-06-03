<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;


class PermissionController extends Controller
{
    public function list(){

        $allroutes=Permission::all();
//        $route->getRoutes()->getRoutesByName();

        return view('Admin.access-control.permission.list',compact('allroutes'));
    }
}
