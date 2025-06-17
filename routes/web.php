<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home-page');
Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');


Route::get('/admin/abouts', [AboutController::class, 'edit'])->name('edit-about');
Route::patch('/admin/abouts', [AboutController::class, 'update'])->name('update-about');

Route::get('/admin/medias',[MediaController::class,'index'])->name('index-media');
Route::post('/admin/medias/store',[MediaController::class,'store'])->name('store-medias');
Route::delete('/admin/medias', [MediaController::class, 'destroy'])->name('delete-medias');

// Route::delete('/medias/delete', [MediaController::class, 'destroy'])->name('delete-medias');



Route::get('/{any}', function () {
    return view('notFound');
})->where('any', '.*');
