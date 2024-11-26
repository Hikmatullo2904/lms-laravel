<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Auth
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Roles
    Route::post('/roles', [RoleController::class, 'create']);
    Route::post('/roles/{id}/permissions', [RoleController::class, 'addPermission']);
    Route::delete('/roles/{id}/permissions', [RoleController::class, 'removePermission']);
});