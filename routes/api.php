<?php

use App\Http\Controllers\Api\AuthController;
use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API ROUTES
|--------------------------------------------------------------------------
*/

// ✅ LOGIN (PAKAI CONTROLLER BIAR ADA TOKEN)
Route::post('/login', [AuthController::class, 'login']);

// ✅ LOGOUT (pakai token)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');

// ✅ USER (harus login/token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
});

// ✅ ambil data eskul
Route::get('/eskul', function () {
    return Eskul::all();
});
