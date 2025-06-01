<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserController;

Route::get('/', [HelloController::class, 'index']);

Route::get('/user/input', [UserController::class, 'showInputForm']);
Route::post('/user/confirm', [UserController::class, 'confirmInput']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/complete', [UserController::class, 'complete']);
