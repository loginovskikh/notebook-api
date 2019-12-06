<?php

namespace App\Http\Controllers\AuthJWT;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\API\BaseResponceController;

class LoginController extends BaseResponceController
{
    public function login(LoginRequest $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = auth()->attempt($input)) {
            return $this->sendError('Invalid Email or Password', 401);
        }

        return $this->sendResponse(['token' => $token],'Authentificate successful');
    }

    
    public function logout(Request $request) {
        if(auth()->user()) {
            auth()->logout();
            return $this->sendResponse([],'User logged out successfully');
        }
        else {
            return $this->sendError('User is not authentificated',null, 500);
        }
        
    }
}
