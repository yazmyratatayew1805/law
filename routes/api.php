<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use Cyberbrains\Filemanager\Controllers\FileController;

Route::prefix('v1')->group(function () {

    Route::controller(RegisterController::class)->group(function(){
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('forgot-password', 'forgotPassword');
        Route::post('check-code', 'checkCode');
        Route::post('change-password', 'changePassword');

        Route::middleware('auth:sanctum')->group( function () {
            Route::post('logout', 'logout');
            Route::put('update-profile', 'updateProfile');
            Route::delete('delete-account', 'deleteAccount');
        });

    });


    });


