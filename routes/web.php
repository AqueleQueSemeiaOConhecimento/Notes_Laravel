<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIfLogged;
use App\Http\Middleware\CheckIsNotLogged;
use Illuminate\Support\Facades\Route;

// auth routes - user not logged
Route::middleware([CheckIsNotLogged::class])->group(function() {
    Route::get('/login', [AuthController::class,'login']);
    Route::post('/loginSubmit', [AuthController::class,'loginSubmit']);
});

// auth routes - user is logged
Route::middleware([CheckIfLogged::class])->group(function() {
    Route::get('/', [MainController::class, 'index']);
    Route::get('/newNote', [MainController::class, 'newNote']);
    Route::get('/logout', [AuthController::class,'logout']);
});
