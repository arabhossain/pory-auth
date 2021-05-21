<?php
use Illuminate\Support\Facades\Route;


//public routes
Route::group(['prefix'=>''], function() {
    Route::post('login', [\Pory\Auth\Controllers\AuthController::class, 'login']);
});

//private routes
Route::group(['middleware'=>['pory-auth']], function() {
    Route::post('/logout', [\Pory\Auth\Controllers\AuthController::class, 'logout']);
});
