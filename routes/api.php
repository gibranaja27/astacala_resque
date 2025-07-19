<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthRelawanController;

Route::post('/register', [AuthRelawanController::class, 'register']);
Route::post('/login', [AuthRelawanController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthRelawanController::class, 'logout']);
