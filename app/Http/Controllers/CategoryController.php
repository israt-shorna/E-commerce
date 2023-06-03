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
        $categories=Category::all();

        return view('Admin.pages.category.form', compact('categories'));
    }

    public  function store(Request $request){

        $fileName="";
        if($request->hasFile('image')){
            $fileName=date('ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        

        Category::create([
            'name'=>$request->category_name,
            'status'=>$request->status,
            'description'=>$request->description,
            'parent_id'=>$request->parent_id,
            'image'=>$fileName

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

    public function edit($id){
 
        $categories=Category::find($id);
        $parent=Category::all();
        return view('Admin.pages.category.edit', compact('categories', 'parent'));
        

    }


    public function update(Request $request, $id){
        $fileName="";
        if($request->hasFile('image')){
            $fileName=date('ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        $categories=Category::find($id);
         
        $categories->update([
            'name'=>$request->category_name,
            'status'=>$request->status,
            'description'=>$request->description,
            'parent_id'=>$request->parent_id,
            'image'=>$fileName

        ]);
        
     toastr()->success('Edited successfully');
        return redirect()->route('category.list');



    }
}
