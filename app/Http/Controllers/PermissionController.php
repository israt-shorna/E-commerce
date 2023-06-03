<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Router;


class PermissionController extends Controller
{
    public function list(Router $route){

        $allroutes=$route->getRoutes()->getRoutesByName();
    
        return view('Admin.access-control.permission.list',compact('allroutes'));
    }
}
