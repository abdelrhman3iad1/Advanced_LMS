<?php

namespace App\Repositories\Eloquent\Auth;

use App\Repositories\Contracts\Auth\AuthRepositoryInterface;
use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\RegisterDTO;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthRepository implements AuthRepositoryInterface {
    public function login(array $data){
        if(!$token = auth()->attempt($data)){
            return null;
        }
        return $token;
    }
    public function findEmail(string $email){
        return User::where('email',$email)->first();
    }
    public function checkPassword(User $user , string $password){
        return Hash::check($password,$user->password);
    }
    public function createToken(User $user){
        return JWTAuth::fromUser($user);
    }
    public function attempt(User $user){
        return auth()->login($user);
    }
    public function register(array $data){

    }
    public function refresh(){

    }
    public function me(){

    }
}
