<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/roles', [RoleController::class, 'store']);
Route::get('/getRoles', [RoleController::class, 'getRoles']);
Route::post('/permissions', [PermissionController::class, 'store']);
Route::get('/getPermissions', [PermissionController::class, 'getPermissions']);
Route::delete('/roles/{id}', [RoleController::class, 'deleteRoles']);
Route::delete('/permissions/{id}', [PermissionController::class, 'deletePermissions']);
Route::put('/roles/{id}', [RoleController::class, 'updateRoles']);
Route::put('/permissions/{id}', [PermissionController::class, 'updatePermissions']);
Route::post('/assignPermission/{id}', [RoleController::class, 'assignPermissions']);

