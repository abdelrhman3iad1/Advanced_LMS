<?php

namespace App\Repositories\Eloquent\Auth;

use App\Repositories\Contracts\Auth\AuthRepositoryInterface;
use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;

class AuthRepository implements AuthRepositoryInterface {
    public function login(array $data){
        $credentials = [
            "email" => $data['email'] ,
            "password"=> $data['password']
        ];
        if(!$token = auth()->attempt($credentials)){
            return null;
        }
        return $token;
    }
    public function register(array $data){

    }
    public function refresh(){

    }
    public function me(){

    }
}
