<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
    
    //Auth
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    
    Route::middleware('auth:sanctum')->group(function () {
        // Roles
        Route::get('/roles', [RoleController::class, 'index']);
        Route::get('/roles/{id}', [RoleController::class, 'show']);
        Route::post('/roles', [RoleController::class, 'create']);
        Route::post('/roles/{id}/permissions', [RoleController::class, 'addPermission']);
        Route::delete('/roles/{id}/permissions', [RoleController::class, 'removePermission']);
    
        //Permissions
        Route::post('/permissions', [PermissionController::class, 'create']);
        Route::get('/permissions', [PermissionController::class, 'index']);

        //Users
        Route::post('/users', [UserController::class, 'create']);
        Route::get('/users', [UserController::class, 'index']);
        Route::put('/users/{id}', [UserController::class, 'update']);
        Route::delete('/users/{id}', [UserController::class, 'delete']);

        //Category
        Route::post('/categories', [CategoryController::class, 'create']);
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::put('/categories/{id}', [CategoryController::class, 'update']);
    });
});
