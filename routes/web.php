<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\YearbookController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\DegreeCourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| php artisan cache:clear php artisan route:clear
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('isAdmin')->prefix('/admin')->group(function () {

        Route::prefix('/degree_courses')->group(function () {
            Route::get('/', [DegreeCourseController::class, 'index'])->name('degree_courses.index');
            Route::get('/create', [DegreeCourseController::class, 'create'])->name('degree_courses.create');
            Route::post('/', [DegreeCourseController::class, 'store'])->name('degree_courses.store');
            Route::get('/show/{id}', [DegreeCourseController::class, 'show'])->name('degree_courses.show');
            Route::get('/edit/{id}', [DegreeCourseController::class, 'edit'])->name('degree_courses.edit');
            Route::patch('/{id}', [DegreeCourseController::class, 'update'])->name('degree_courses.update');
            Route::delete('/{id}', [DegreeCourseController::class, 'destroy'])->name('degree_courses.destroy');

            Route::prefix('/yearbook')->group(function () {
                Route::controller(YearbookController::class)->name('yearbooks.')->group(function () {
                Route::get('/{id}', 'index')->name('index');
                Route::get('/create/{id}', 'create')->name('create');
                Route::post('/{id}', 'store')->name('store');
                // Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::patch('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
                });
                Route::prefix('/class')->group(function () {
                    Route::get('/{id}', [ClassesController::class, 'index'])->name('class.index');
                    Route::get('/create', [ClassesController::class, 'create'])->name('class.create');
                    Route::post('/', [ClassesController::class, 'store'])->name('class.store');
                    Route::get('/show/{id}', [ClassesController::class, 'show'])->name('class.show');
                    Route::get('/edit/{id}', [ClassesController::class, 'edit'])->name('class.edit');
                    Route::patch('/{id}', [ClassesController::class, 'update'])->name('class.update');
                    Route::delete('/{id}', [ClassesController::class, 'destroy'])->name('class.destroy');
                });
            });
        });
        Route::prefix('/instructors')->group(function () {
            Route::get('/', [InstructorsController::class, 'index'])->name('instructors.index');
            Route::get('/create', [InstructorsController::class, 'create'])->name('instructors.create');
            Route::post('/', [InstructorsController::class, 'store'])->name('instructors.store');
            Route::get('/show/{id}', [InstructorsController::class, 'show'])->name('instructors.show');
            Route::get('/edit/{id}', [InstructorsController::class, 'edit'])->name('instructors.edit');
            Route::patch('/{id}', [InstructorsController::class, 'update'])->name('instructors.update');
            Route::delete('/{id}', [InstructorsController::class, 'destroy'])->name('instructors.destroy');
        });
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
