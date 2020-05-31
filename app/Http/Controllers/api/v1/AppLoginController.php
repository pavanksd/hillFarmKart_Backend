<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class AppLoginController extends Controller
{
    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');        
        if (Auth::attempt($credentials)) {
            // Authentication passed
             return response()->json(['authenticate'=>TRUE, 'code'=>200]);
        } else {
            // Authentication Failed
            return response()->json(['authenticate'=>FALSE, 'code'=>401]);
        }
    }   
}
