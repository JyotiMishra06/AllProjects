<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::post('register', 'register');
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');
// });   

Route::middleware('cors')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::get('getUsers', 'view');
        Route::delete('deleteUsers/{id}', 'destroy'); 
        Route::put('updateUsers/{id}', 'update'); 
    });
});

