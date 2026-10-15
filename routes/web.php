<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;

use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\SchoolClass\DestroyController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/login', [AuthController::class, 'LoginView'])->name('login-view')->middleware('guest');
Route::post('/login', [AuthController::class, 'LoginPost'])->name('login-post')->middleware('guest');
Route::get('/register', [AuthController::class, 'RegisterView'])->name('register-view')->middleware('guest');
Route::post('/register', [AuthController::class, 'RegisterPost'])->name('register-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout')->middleware('auth');

// Management Data Student (Action Controller)
Route::name('students.')->middleware(['role:student,teacher', 'auth'])->prefix('students')->controller(StudentController::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::get('/{student}', 'show')->name('show')->whereNumber('student');

    Route::get('/{student}/edit', 'edit')->name('edit')->whereNumber('student');

    Route::post('/', 'store')->name('store');

    Route::put('/{student}', 'update')->name('update')->whereNumber('student');

    Route::delete('/{student}', 'destroy')->name('destroy')->whereNumber('student');

});

// Management Data Teacher (Action Controller)
Route::name('teachers.')->middleware(['role:teacher', 'auth'])->prefix('teachers')->controller(TeacherController::class)->group(function () {

    Route::get('/', 'index')->name('index');

    Route::get('/create', 'create')->name('create');

    Route::get('/{id}', 'show')->name('show')->whereNumber('id');

    Route::get('/{id}/edit', 'edit')->name('edit')->whereNumber('id');

    Route::post('/', 'store')->name('store');

    Route::put('/{id}', 'update')->name('update')->whereNumber('id');

    Route::delete('/{id}', 'destroy')->name('destroy')->whereNumber('id');

});

// Management SchoolClass (Invokable)

Route::name('classes.')->middleware(['role:teacher', 'auth'])->prefix('classes')->group(function () {
    // Halaman Daftar Class
    Route::get('/', IndexController::class)->name('index');

    // Halaman Tambah Class
    Route::get('/create', CreateController::class)->name('create');

    // Halaman Detail Class
    Route::get('/{id}', ShowController::class)->name('show')->whereNumber('id');

    // Halaman Edit Class
    Route::get('/{id}/edit', EditController::class)->name('edit')->whereNumber('id');

    // Logika Tambah Class
    Route::post('/', StoreController::class)->name('store');

    // Logika Edit Class
    Route::put('/{id}', UpdateController::class)->name('update')->whereNumber('id');

    // Logika Hapus Class
    Route::delete('/{id}', DestroyController::class)->name('destroy')->whereNumber('id');
});

// Management Major (Resource Controller)

Route::resource('majors', MajorController::class)->middleware(['role:teacher', 'auth']);