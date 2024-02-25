<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use Cyberbrains\Filemanager\Controllers\FileController;
use App\Http\Controllers\API\IntensionController;
use App\Http\Controllers\API\BeliefController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\CurrencyController;

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


            // intension crud
            Route::get('intension/index', [IntensionController::class, 'index']);
            Route::post('intension/create', [IntensionController::class, 'create']);
            Route::put('intension/{id}/update', [IntensionController::class, 'update']);
            Route::delete('intension/{id}/delete', [IntensionController::class, 'delete']);


            // belief crud
            Route::get('belief/index', [BeliefController::class, 'index']);
            Route::post('belief/create', [BeliefController::class, 'create']);
            Route::put('belief/{id}/update', [BeliefController::class, 'update']);
            Route::delete('belief/{id}/delete', [BeliefController::class, 'delete']);

            // program crud
            Route::get('program/index', [ProgramController::class, 'index']);
            Route::post('program/create', [ProgramController::class, 'create']);
            Route::put('program/{id}/update', [ProgramController::class, 'update']);
            Route::delete('program/{id}/delete', [ProgramController::class, 'delete']);

            // currency crud
            Route::get('currency/index', [CurrencyController::class, 'index']);
            Route::post('currency/create', [CurrencyController::class, 'create']);
            Route::put('currency/{id}/update', [CurrencyController::class, 'update']);
            Route::delete('currency/{id}/delete', [CurrencyController::class, 'delete']);



    });


    });


