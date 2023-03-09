<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|string',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status' => 'error',
                'message'=>implode(',',$validator->errors()->all())
            ]);
        }
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'Wrong Email'
            ]);
        }

        $credentials = request(['email','password']);

            if(!Auth::guard('web')->attempt($credentials))
            return response()->json([
                'status' => 'error',
                'message' => 'Wrong Password'
            ]);
      
            $token = auth()->user()->createToken('API Token')->plainTextToken; 
            
            return response()->json([
                'status' => 'success',
                'message' => 'Login success!',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ]);
    }
}
