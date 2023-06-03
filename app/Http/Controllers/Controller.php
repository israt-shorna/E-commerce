<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function responseWithSuccess($data, $message){
        return response()->json([
          'Success'=>true,
          'data'=>$data,
          'message'=>$message,
          'status_code'=>200
        ]);

    }

    public function responseWithError($message, $code=403){
        return response()->json([
          'Success'=>false,
          'data'=>[],
          'message'=>$message,
          'status_code'=>$code
        ]);

    }


}
