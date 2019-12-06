<?php

namespace App\Http\Controllers\AuthJWT;

use App\User;
use App\Http\Requests\RegistrationFormRequest;
use App\Http\Controllers\API\BaseResponceController;

class RegisterController extends BaseResponceController {
    
    public function register(RegistrationFormRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return $this->sendResponse(null, 'User register successfully.'); 
    }
}
