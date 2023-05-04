<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'login']);
Route::post('login/submit', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'principle'], function () {
    Route::get('principle/home', [HomeController::class, 'principle']);
});
Route::group(['middleware' => 'teach'], function () {
    Route::get('teacher/home', [HomeController::class, 'teacher']);
});

Route::group(['middleware' => 'studen'], function () {
    Route::get('student/home', [HomeController::class, 'student']);
});
