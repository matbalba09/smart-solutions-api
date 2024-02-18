<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GeneralPurposeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {

    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);

    Route::prefix('general_purpose')->group(function () {
        Route::get('/', [GeneralPurposeController::class, 'index']);
        Route::post('create', [GeneralPurposeController::class, 'create']);
        Route::put('update/{id}', [GeneralPurposeController::class, 'update']);
        Route::delete('delete/{id}', [GeneralPurposeController::class, 'delete']);
    });
    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'index']);
        Route::post('create', [EventController::class, 'create']);
        Route::put('update/{id}', [EventController::class, 'update']);
        Route::delete('delete/{id}', [EventController::class, 'delete']);
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {
        
        // Route::prefix('general_purpose')->group(function () {
        //     Route::get('/', [GeneralPurpose::class, 'index']);
        //     Route::post('create', [GeneralPurpose::class, 'create']);
        //     // Route::post('update/{id}', [GeneralPurpose::class, 'update']);
        //     // Route::delete('delete/{id}', [GeneralPurpose::class, 'delete']);
        // });
    });

});
