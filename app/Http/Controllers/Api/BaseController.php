<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function systemErrors($e)
    {
        return response()->json([
           'status'=>false,
           'code'=>$e->getCode(),
           'message'=>$e->getMessage(), 
        ]);
    }
}
