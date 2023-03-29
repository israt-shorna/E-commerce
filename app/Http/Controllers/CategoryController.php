<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){

        $cat= Category::paginate(2);

        return view ('Admin.pages.category.list', compact('cat'));
    }

    public function form(){

        return view('Admin.pages.category.form');
    }

    public  function store(Request $request){

        Category::create([
            'name'=>$request->category_name,
            'status'=>$request->status,
            'description'=>$request->description,

        ]);

        return redirect()->back();
    }



    public function view(){
        
    }
}
