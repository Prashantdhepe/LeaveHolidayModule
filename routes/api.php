<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\EventController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/holidays', [HolidayController::class, 'index']);
    Route::post('/holidays', [HolidayController::class, 'store']);
    Route::put('/holidays/{id}', [HolidayController::class, 'update']);
    Route::delete('/holidays/{id}', [HolidayController::class, 'destroy']);

    Route::get('/leaves', [LeaveController::class, 'userLeave']);
    Route::get('/leaves/apply', [LeaveController::class, 'apply']);
    Route::get('/leaves/{id}/status', [LeaveController::class, 'update']);
    Route::get('/leaves/balance', [LeaveController::class, 'balanceLeave']);
    Route::get('/leaves/my', [LeaveController::class, 'myLeaves']);
});


Route::apiResource('events', EventController::class);