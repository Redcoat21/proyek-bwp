<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/counter', Counter::class);

Route::prefix('/test')->group(function () {
    Route::get('/auth', fn () => view('temp.auth'))->name('login');
    Route::post('/auth', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/file', [\App\Http\Controllers\FileController::class, 'showFile']);
});

Route::middleware('auth')->group(function () {
    Route::get('/home', fn () => "<h1>Helllo World</h1>")->name('home');
    Route::get('/file', fn () => view('temp.file'))->name('file');
});
