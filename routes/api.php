<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PelaporanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "api"
| middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registersss', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ✅ Route yang butuh token (login dulu baru bisa akses)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', function (Request $request) {
        return response()->json([
            'message' => 'Profil pengguna berhasil diambil',
            'data' => $request->user()
        ]);
    });

    // Contoh tambahan: logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/pelaporans', [PelaporanController::class, 'store']);
});

Route::get('/pelaporans/diterima', [PelaporanController::class, 'getDiterima']);

