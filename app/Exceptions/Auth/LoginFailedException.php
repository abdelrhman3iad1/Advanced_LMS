<?php

namespace App\Exceptions\Auth;

use Exception;
use Illuminate\Support\Facades\Log;

class LoginFailedException extends Exception
{

    protected $message = "Credentials are not correct";
    
    // public function report(){
    //     Log::channel('auth')->alert("Login failed: " . $this->getMessage());
    // }
    // public function render($request){
    //     return api_response(
    //         false,
    //         null,
    //         'Login Failed',
    //         400
    //     );
    // }

}
