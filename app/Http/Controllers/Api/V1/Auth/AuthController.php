<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        public AuthService $service
    ){}

    public function login(LoginRequest $request){
        $data = $request->validated();
        $token = $this->service->login($data);
        if(!$token) return api_response(
            false,null,'Login Failed',400
        );
        return api_response(
            true,["token"=>$token],'Login Success',200
        );
    }
}
