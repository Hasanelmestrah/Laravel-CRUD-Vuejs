<?php

// use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/users', usersController::class);

Route::post('/register',[RegisterController::class,'store']);

Route::post('/login', [LoginController::class, 'check']);

// Route::post('show/{id}', [LoginController::class, 'show']);


