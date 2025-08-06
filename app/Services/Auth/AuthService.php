<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\LoginFailedException;
use App\Models\User;
use App\Repositories\Eloquent\Auth\AuthRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use function Symfony\Component\Clock\now;

class AuthService {
    public function __construct(private AuthRepository $authRepository){}

    public function login($data){
        $key = $this->getLoginRateLimiterKey($data['email']);
        $this->checkLoginRateLimits($data['email']);

        $user = $this->authRepository->findEmail($data["email"]);

        if(!$user || !$this->authRepository->checkPassword($user , $data["password"])){
            RateLimiter::increment($key);
            throw new LoginFailedException();
        }

        $token = $this->authRepository->createToken($user);
        RateLimiter::clear($key);

        return [
            'token' => $token,
            'user' => [
                'id'=>$user->id,
                'name'=>$user->full_name,
                'email'=>$user->email,
            ],
            'expires_at' => Carbon::now()->addMinutes(config('jwt.ttl'))->toDateTimeString()
        ];
    }
    private function checkLoginRateLimits(string $email){
        $key = $this->getLoginRateLimiterKey($email);

        if(RateLimiter::tooManyAttempts($key,5)){
            $seconds = RateLimiter::availableIn($key);
            throw ValidationException::withMessages([
                    'error'=>"Too many attempts , please try again in {$seconds} seconds .",
                ]);
        }
    }
    private function getLoginRateLimiterKey(string $email){
        return 'login :'.$email;
    }

}
