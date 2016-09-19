<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Authorizer;

class PasswordGrantVerifier
{
    public function verify(Request $request)
    {
        $params = $request->only(['username', 'password']);
        $username = $params['username'];
        $password = $params['password'];

        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];
        if (Auth::once($credentials)) {
            // return Auth::user()->id;
            $user = Auth::user();
            // $user->access_token = Authorizer::issueAccessToken();
            
            return $user;
        }
        return false;
    }
}