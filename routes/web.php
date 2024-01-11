<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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
    Route::get('/newCourse', [PageController::class, 'getNewestCourses']);
    Route::get('/file', fn() => view('temp.file'));
    Route::post('/file/submit', [\App\Http\Controllers\FileController::class, 'showFile']);
    Route::get('/awikwok', fn () => "<h1>Hello</h1>")->middleware('role.check:STU');
});

Route::middleware('auth')->group(function () {
    //khusus buat student
    Route::middleware('role.check:STU')->group(function(){
        Route::get('/listCourse', [PageController::class, 'showListCourse'])->name('listCourse.get');
        Route::get('/listLecturer', [PageController::class, 'testAjax'])->name('listLecturer.get');
        Route::get('/addCourse', [PageController::class,'listAddCourse'])->name('addCourse.get');
        Route::post('/addCourse', [DataController::class,'addCourse']);
        Route::get('/lecturer/{username}', [PageController::class, 'showLecturerDetail'])->name('lecturerDetail.get');
        Route::post('/buyCourse/{id}', [DataController::class, 'buyCourse'])->name('buyCourse.post');
    });

    //routing untuk course lecturer
    Route::middleware(('role.check:LEC'))->group(function(){
        Route::get('/lecturer/course/{id}', [PageController::class, 'showDetailCourse']);
        Route::get('/addSubCourse/{id}', [PageController::class, 'showAddSubCourse']);
        Route::post('/addSubCourse/{id}', [DataController::class, 'addSubCourse']);
        Route::get('/editSubCourse/{id}', [PageController::class, 'updateSubCourse']);
        Route::post('/editSubCourse/{id}', [DataController::class, 'updateSubCourse']);
        Route::get('/deleteSubCourse/{id}', [DataController::class, 'deleteSubCourse']);
        Route::get('/publishCourse/{id}', [DataController::class, 'publishCourse']);
        Route::get('/disableCourse/{id}', [DataController::class, 'disableCourse']);
        Route::get('/detailSubCourse/{id}', [PageController::class, 'detailSubCourseLecturer']);
    });

    //admin page
    Route::middleware(('role.check:ADM'))->group(function(){
        Route::get('/adminProfile', [PageController::class, 'showAdminProfile'])->name('adminProfile.get');
        Route::get('/listUser', [PageController::class, 'showAdminPage']);
        Route::get('/addUser', [PageController::class, 'showAddUser']);
        Route::post('/addUser', [DataController::class, 'addUser']);
        Route::get('/deleteUser/{uname}', [DataController::class, 'deleteUser']);
        Route::get('/updateUser/{uname}', [PageController::class, 'updateUser']);
        Route::post('/updateUser/{uname}', [DataController::class, 'updateUser']);
    });
});

// Route::prefix('profile')->group(function() {
    Route::get('/editProfile', [PageController::class, 'showEditProfile'])->name('profile.editProfile.get');
    Route::get('/toEdit', [PageController::class, 'toEdit'])->name('profile.toEdit.get');
    Route::patch('/edit', [UserController::class, 'updateStudent'])->name('profile.edit.patch');
// });

Route::get('/profile', [PageController::class, 'showProfile'])->name('profile.get');

Route::get('/courseDetail/{id}', [PageController::class, 'showCourseDetail'])->name('courseDetail.get');
Route::get('/course/{id}', [PageController::class, 'showCourse'])->name('course.get');
Route::get('/subCourse/{id}', [PageController::class, 'showSubCourse'])->name('subCourse.get');

//routing untuk ajax
Route::get('/search', [DataController::class, 'search']);
Route::get('/lecturerProfile', [PageController::class, 'showLecturerProfile'])->name('lecturerProfile.get');
Route::get('/searchLecturer', [DataController::class, 'searchLecturer']);



