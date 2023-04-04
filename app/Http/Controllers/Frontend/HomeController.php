<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function website(){

        $categories=Category::all();
        

        return view('Website.pages.home',compact('categories'));
    }
}
