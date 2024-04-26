<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventUserController;
use App\Http\Controllers\HeartbeatController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
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

    Route::get('Heartbeat', [HeartbeatController::class, 'Heartbeat']);

    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('getAllUserFp', [UserController::class, 'getAllUserFpUsers']);
        Route::get('{id}', [UserController::class, 'getUserById']);
        Route::put('registerUserFp/{id}', [UserController::class, 'registerUserFp']);
        Route::get('getUserFpByUserId/{id}', [UserController::class, 'getUserFpByUserId']);
        Route::get('getUserByName/{name}', [UserController::class, 'getUserByName']);
        Route::get('getAllUserByDepartment/{department}', [UserController::class, 'getAllUserByDepartment']);
        Route::get('getAllUserByYearLevel/{year_level}', [UserController::class, 'getAllUserByYearLevel']);
        Route::get('getUserBySrCode/{sr_code}', [UserController::class, 'getUserBySrCode']);
        Route::get('updateUser/{id}', [UserController::class, 'updateUser']);
    });

    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'index']);
        Route::get('{id}', [EventController::class, 'getEventById']);
        Route::get('getAllbyEventType/{event_type}', [EventController::class, 'getAllbyEventType']);
        Route::post('create', [EventController::class, 'create']);
        Route::put('update/{id}', [EventController::class, 'update']);
        Route::delete('delete/{id}', [EventController::class, 'delete']);
        Route::get('getAllByStatus/{event_status}', [EventController::class, 'getAllByStatus']);
    });

    Route::prefix('eventUser')->group(function () {
        Route::get('/', [EventUserController::class, 'index']);
        Route::get('getAllByEventId/{id}', [EventUserController::class, 'getAllByEventId']);
        Route::post('create', [EventUserController::class, 'createMany']);
        Route::get('getAllFpUsersByEventId/{id}', [EventUserController::class, 'getAllFpUsersByEventId']);
    });

    Route::prefix('log')->group(function () {
        Route::get('/', [LogController::class, 'index']);
        Route::post('create', [LogController::class, 'create']);
        Route::get('getByEventIdAndUserId/{event_id}/{user_id}', [LogController::class, 'getByEventIdAndUserId']);
        Route::get('getAllByEventId/{event_id}', [LogController::class, 'getAllByEventId']);
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {
    });
});