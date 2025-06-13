<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home-page');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
Route::get('/admin/abouts', [AboutController::class, 'edit'])->name('edit-about');

Route::get('/{any}', function () {
    return view('notFound');
})->where('any', '.*');
