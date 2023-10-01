<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FieldOfStudyController;
use App\Http\Controllers\ProfileController;

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
        Route::prefix('/field_of_studies')->group(function () {
            Route::get('/', [FieldOfStudyController::class, 'index'])->name('fos.index');
            Route::get('/create', [FieldOfStudyController::class, 'create'])->name('fos.create');
            Route::post('/', [FieldOfStudyController::class, 'store'])->name('fos.store');
            Route::get('/show/{id}', [FieldOfStudyController::class, 'show'])->name('fos.show');
            Route::get('/edit/{id}', [FieldOfStudyController::class, 'edit'])->name('fos.edit');
            Route::post('/{id}', [FieldOfStudyController::class, 'update'])->name('fos.update');
            Route::get('/{id}', [FieldOfStudyController::class, 'destroy'])->name('fos.destroy');
        });
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
