<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'showHome'])->name('home.get');
Route::get('/lecturer/detail', [PageController::class, 'showLecturerDetail'])->name('lecturerDetail.get');

// LOGIN AND REGISTER
Route::prefix('auth')->group(function () {
    // SHOW PAGE
    Route::controller(PageController::class)->group(function () {
        Route::get('/', [PageController::class, 'showAuthPage'])->name('auth.get');
        Route::post('/', [AuthController::class, 'process'])->name('auth.post');
        Route::get('/toggle', [PageController::class, 'toggleLogin'])->name('auth.get.toggle');
    });

    // PROCESS FORM
    Route::controller(AuthController::class)->group(function () {
        Route::post('/', [AuthController::class, 'process'])->name('auth.post');
        Route::post('/logout', [AuthController::class, 'logout'])->name('auth.post.logout');
    });
});

// Ini buat dipake sama backend doang, jangan di apa apain kecuali mau ngetes juga :)
Route::prefix('/test')->group(function () {
    Route::get('/auth', fn () => view('temp.auth'))->name('login');
    Route::post('/auth', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/test2', [PageController::class, 'getTopThreeLecturer']);
});

Route::middleware('auth')->group(function () {
    Route::get('/listCourse', [PageController::class, 'showListCourse'])->name('listCourse.get');
    Route::get('/listLecturer', [PageController::class, 'showListLecturer'])->name('listLecturer.get');
    Route::get('/addCourse', [PageController::class, 'showAddCourse'])->name('addCourse.get');
});

Route::get('/subCourse', [PageController::class, 'showSubCourse'])->name('subCourse.get');
Route::get('/courseDetail', [PageController::class, 'showCourseDetail'])->name('courseDetail.get');
Route::get('/course', [PageController::class, 'showCourse'])->name('course.get');
Route::get('/studentProfile', [PageController::class, 'showStudentProfile'])->name('studentProfile.get');
Route::get('/editProfile', [PageController::class, 'showEditProfile'])->name('editProfile.get');
Route::get('/lecturerProfile', [PageController::class, 'showLecturerProfile'])->name('lecturerProfile.get');
Route::post('/toEdit', [PageController::class, 'toEdit'])->name('toEdit.post');
Route::get('/back', [PageController::class, 'showBack'])->name('back.get');

Route::get('/addSubCourse', [PageController::class, 'showAddSubCourse'])->name('addSubCourse.get');

//routing untuk ajax
Route::get('/search', [DataController::class, 'search']);
