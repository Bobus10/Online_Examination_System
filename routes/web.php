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
            Route::controller(DegreeCourseController::class)->name('degree_courses.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', [, 'create'])->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::patch('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });

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
                    Route::controller(ClassesController::class)->name('class.')->group(function () {
                        Route::get('/{id}', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/show/{id}', 'show')->name('show');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::patch('/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                    });
                });
            });
        });
        Route::prefix('/instructors')->group(function () {
            Route::controller(InstructorsController::class)->name('instructors.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::patch('/{id}', 'update')->name('update');
                Route::delete('/{id}', 'destroy')->name('destroy');
            });
        });
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
