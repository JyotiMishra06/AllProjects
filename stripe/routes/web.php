<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;



Route::get('/', function () {
    return view('welcome');
});

Route::Post('stripe',[StripeController::class,'stripe'])->name('stripe');
Route::Get('success',[StripeController::class,'success'])->name('success');
Route::Get('cancel',[StripeController::class,'cancel'])->name('cancel');