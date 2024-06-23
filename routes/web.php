<?php

use App\Http\Controllers\mainController;
use App\Http\Middleware\localMiddleware;
use App\Http\Middleware\mainMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[mainController::class,'view_form']);
Route::post('/',[mainController::class,'save_form']);
Route::get('/list',[mainController::class,'view_list']);
Route::get('/login',[mainController::class,'view_login']);
Route::post('/login',[mainController::class,'login']);
Route::get('/dashboard',[mainController::class,'view_dashboard'])->middleware(mainMiddleware::class);
Route::get('/logout',[mainController::class,'logout']);
