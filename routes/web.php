<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/auth', [AdminController::class, 'authenticate'])->name('admin.auth');

Route::middleware('admin')->group(
    function () {   
        Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    }
);