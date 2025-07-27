<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\AuthController;


Route::prefix('v1')->controller(AuthController::class)->middleware('jwt.auth')->group(function(){
    Route::post('login','login');
    Route::post('register','register');
    Route::post('refresh','refresh');
    Route::post('me','me');
});
