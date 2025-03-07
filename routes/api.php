<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;

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



Route::post('/v1/auth', [AuthController::class, 'login']);

Route::post('/v1/register', [RegisterController::class, 'register']);

Route::post('/v1/password/check-email', [PasswordResetController::class, 'checkEmail']);

Route::post('/v1/password/send-code', [PasswordResetController::class, 'sendResetCode']);

Route::post('/v1/password/reset', [PasswordResetController::class, 'resetPassword']);




Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/logout', [AuthController::class, 'logout']);
    

    
    Route::get('/v1/all', [UserController::class, 'all'])->middleware('role:admin');

   
    Route::get('/v1/users', [UserController::class, 'users'])->middleware('role:manager');

    
    Route::get('/v1/userinfo', [UserController::class, 'userinfo'])->middleware('role:user');
});





