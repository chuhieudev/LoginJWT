<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    public function register(UserRequest $request)
    {
        try{
            $user=User::create($request->validated());
            return response()->json([
                'status'=>true,
                'user'  =>$user,
            ],200);
        }catch(\Exception $e){
            return $this->systemErrors($e);
        }
    }

    public function login(Request $request)
    {
            $data = [
                'email' => $request->email,
                'password' => $request->password
            ];
      
            if (auth()->attempt($data)) {
                $token = auth()->user()->createToken('authToken')->plainTextToken;
                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(['error' => 'email or password incorrect'], 401);
            } 
    }
}
