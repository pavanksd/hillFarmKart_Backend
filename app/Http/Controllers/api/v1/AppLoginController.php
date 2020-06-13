<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class AppLoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $userData = Auth::user();
            return response()->json(['authenticate'=>TRUE, 'userData'=>$userData, 'code'=>200],200);
        } else {
            // Authentication Failed
            return response()->json(['authenticate'=>FALSE, 'code'=>200],200);
        }
    }

    public function registerUser(Request $request) {
 
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
        $input     = $request->only('name', 'email','password');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'code'=>200, 'error' => $validator->messages()],200);
        }

        $name       = $input['name'];
        $email      = $input['email'];
        $password   = $input['password'];
        $userData   = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);    
        return response()->json(['status' => true, 'userData'=>$userData, 'code'=>201],201);
    }
}
