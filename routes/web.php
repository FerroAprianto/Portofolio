<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES — Portofolio
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');
Route::get('/download-cv', [HomeController::class, 'downloadCV'])->name('cv.download');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Login (tidak perlu auth)
    Route::get('/login',  [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Area terproteksi — wajib login sebagai admin
    Route::middleware('admin')->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Project CRUD
        Route::resource('projects', ProjectController::class);
        Route::patch('projects/{project}/toggle', [ProjectController::class, 'toggleVisibility'])
            ->name('projects.toggle');
    });
});