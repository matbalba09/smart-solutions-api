<?php

use App\Http\Controllers\ClassAttendanceController;
use App\Http\Controllers\ClassAttendanceLogController;
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
        Route::put('updateUser/{id}', [UserController::class, 'updateUser']);
    });
    Route::put('updateAdmin/{id}', [UserController::class, 'updateAdmin']);

    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'index']);
        Route::get('{id}', [EventController::class, 'getEventById']);
        Route::get('getAllbyEventType/{event_type}', [EventController::class, 'getAllbyEventType']);
        Route::post('create', [EventController::class, 'create']);
        Route::put('update/{id}', [EventController::class, 'update']);
        Route::delete('delete/{id}', [EventController::class, 'delete']);
        Route::get('getAllByStatus/{event_status}', [EventController::class, 'getAllByStatus']);
        Route::get('getAll/DeletedEvents', [EventController::class, 'getAllDeletedEvents']);
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

    Route::prefix('classAttendance')->group(function () {
        Route::get('/', [ClassAttendanceController::class, 'index']);
        Route::get('{id}', [ClassAttendanceController::class, 'getClassAttendanceById']);
        Route::post('create', [ClassAttendanceController::class, 'create']);
        Route::put('update/{id}', [ClassAttendanceController::class, 'update']);
        Route::delete('delete/{id}', [ClassAttendanceController::class, 'delete']);
    });

    Route::prefix('classAttendanceLog')->group(function () {
        Route::get('/', [ClassAttendanceLogController::class, 'index']);
        Route::get('{id}', [ClassAttendanceLogController::class, 'getClassAttendanceLogById']);
        Route::post('create', [ClassAttendanceLogController::class, 'create']);
        Route::put('update/{id}', [ClassAttendanceLogController::class, 'update']);
        Route::delete('delete/{id}', [ClassAttendanceLogController::class, 'delete']);

        Route::get('getAllByClassAttendanceId/{class_attendance_id}', [ClassAttendanceLogController::class, 'getAllByClassAttendanceId']);
        Route::get('getByClassAttendanceIdAndUserId/{id}/{userid}', [ClassAttendanceLogController::class, 'getByClassAttendanceIdAndUserId']);
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {
    });
});