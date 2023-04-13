<?php

namespace App\Http\Controllers;

use notify;
use toastr;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){

        $categories= Category::paginate(2);

        return view ('Admin.pages.category.list', compact('categories'));
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
        
     toastr()->success('Created successfully');
        return redirect()->route('category.list');
    }



    public function view($id){

        $categories= Category::find($id);
        return view('Admin.pages.category.view',compact('categories'));
        

    }


    public function delete($id){

        Category::find($id)->delete();
        toastr()->error('deleted successfully');
        return redirect()->back();
    }
}
