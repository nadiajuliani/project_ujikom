<?php

use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API ROUTES
|--------------------------------------------------------------------------
*/

// LOGIN
Route::post('/login', function (Request $request) {

    if (! Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'Login gagal',
        ], 401);
    }

    return response()->json([
        'message' => 'Login berhasil',
        'user'    => Auth::user(),
    ]);
});


// LOGOUT (pakai token)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');

// USER (harus login/token)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
});

// ambil data eskul
Route::get('/eskul', function () {
    return Eskul::all();
});