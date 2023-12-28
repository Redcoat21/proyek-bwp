<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
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

Route::prefix('auth')->group(function () {
    Route::get('/', [PageController::class, 'showAuthPage'])->name('auth.get');
    Route::post('/', [AuthController::class, 'process'])->name('auth.post');
    Route::get('/toggle', [PageController::class, 'toggleLogin'])->name('auth.get.toggle');
});

Route::get('/', [PageController::class, 'showHome'])->name('home.get');
Route::get('/listcourse', [homeController::class, 'getlistcourse'])->name('listcourse.get');
Route::get('/lecturer', [homeController::class, 'getlecturer'])->name('lecturer.get');
Route::get('/lecturer/detail', [homeController::class, 'getlecturerdetail'])->name('lecturer_detail.get');

Route::prefix('/test')->group(function () {
    Route::get('/auth', fn () => view('temp.auth'))->name('login');
    Route::post('/auth', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/file', [\App\Http\Controllers\FileController::class, 'showFile']);
    Route::get('/test2', [PageController::class, 'getTopThreeLecturer']);
});

Route::middleware('auth')->group(function () {
    Route::get('/file', fn () => view('temp.file'))->name('file');
});
