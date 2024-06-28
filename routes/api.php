<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/todo/add',[TaskController::class,'add']);
Route::post('/todo/status',[TaskController::class,'status']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
