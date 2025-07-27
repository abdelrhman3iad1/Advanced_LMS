<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {


    Route::get('/test', fn () => ['msg' => 'v1 route']);



});

require __DIR__.'/Modules/auth.php';
