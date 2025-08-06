<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Exceptions\Auth\LoginFailedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Log;
use \Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\RateLimiter;
use Throwable;
class AuthController extends Controller
{
    public function __construct(
        public AuthService $service
    ){}

    public function login(LoginRequest $request){
        try{
            $data = $request->validated();
            $data = $this->service->login($data);

            return success_response(
                $data,
                'Login Successed',
                Response::HTTP_OK
            );

        }catch(LoginFailedException $E){
            return error_response(
                'Credentials not Correct',
                Response::HTTP_UNAUTHORIZED
            );
        }catch(ValidationException $E){
            return error_response(
                $E->getMessage(),
                Response::HTTP_BAD_REQUEST
            );

        }catch(Throwable $e){

            Log::channel('auth')->alert('Login Failed',[
                'error'=>$e->getMessage(),
                'trace'=>$e->getTraceAsString(),
            ]);
            return error_response(
                'Error Occured',
                Response::HTTP_INTERNAL_SERVER_ERROR
            );

        }

    }
}

