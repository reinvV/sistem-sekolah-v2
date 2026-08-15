<?php

use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MajorController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//---------------------------------------------------------------------------------------------------------------------------------//(Students)
Route::name('students.')->prefix('students')->group(function () {
    
    //page

    Route::get('/', [StudentController::class, 'index'])->name('index');

    Route::get('/create', [StudentController::class, 'create'])->name('create');

    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');

    Route::get('/{id}', [StudentController::class, 'show'])->name('show');

    //logic

    Route::put('/{id}', [StudentController::class, 'update'])->name('update');

    Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');

    Route::post('/', [StudentController::class, 'store'])->name('store');

});
//---------------------------------------------------------------------------------------------------------------------------------//(Teachers)
Route::name('teachers.')->prefix('teachers')->group(function () {
    
    //page

    Route::get('/', [TeacherController::class, 'index'])->name('index');

    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    Route::get('/{id}', [TeacherController::class, 'show'])->name('show');

    //logic

    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');

    Route::post('/', [TeacherController::class, 'store'])->name('store');

});
//---------------------------------------------------------------------------------------------------------------------------------//(School Classes)
Route::name('classes.')->prefix('classes')->group(function () {
    
    //page

    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::get('/create', [CreateController::class, 'create'])->name('create'); // <-- changed

    Route::get('/{id}/edit', [EditController::class, 'edit'])->name('edit');

     Route::get('/{id}', [ShowController::class, 'show'])->name('show');

    //logic

    Route::put('/{id}', [UpdateController::class, 'update'])->name('update');

    Route::delete('/{id}', [DestroyController::class, 'destroy'])->name('destroy');

    Route::post('/', [StoreController::class, 'store'])->name('store');

});

//---------------------------------------------------------------------------------------------------------------------------------//(Major)
    Route::resource('majors', MajorController::class);


// Route::get('/students/{id}', function ($id) {
//     return "menampilkan detail siswa dengan ID: $id";
// })->name('students.show');   