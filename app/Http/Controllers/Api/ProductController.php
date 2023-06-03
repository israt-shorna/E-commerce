<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Catch_;

use function Ramsey\Uuid\v1;

class ProductController extends Controller
{
    public function getProduct(){

        Try {$products=Product::all();
        return $this->responseWithSuccess($products, 'product loaded successfully');
        } 
        Catch (\Throwable $exception){
            return $this-> responseWithError($exception, 402);
        }

    }

    public function storeProduct(Request $request){

        $validate=Validator::make($request->all(),[
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required|gt:0'


        ]);


        if($validate->fails()){
            return $this->responseWithError($validate->error());

        }

        $fileName="";
        if($request->hasFile('image'))
        {
            $fileName= date('ymdhis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads', $fileName);


        }

        $products=Product::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'image'=>$fileName,
           'price'=>$request->price,
           'description'=>$request->description
            
        ]);

        return $this->responseWithSuccess($products, 'products created successfully');



    }
}
