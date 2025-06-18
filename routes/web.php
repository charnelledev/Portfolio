<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home-page');
Route::middleware('auth',"admin")->group(function(){

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
    
    
    Route::get('/admin/abouts', [AboutController::class, 'edit'])->name('edit-about');
    Route::patch('/admin/abouts', [AboutController::class, 'update'])->name('update-about');
    
    Route::get('/admin/medias',[MediaController::class,'index'])->name('index-media');
    Route::post('/admin/medias/store',[MediaController::class,'store'])->name('store-medias');
    Route::delete('/admin/delete/', [MediaController::class, 'destroy'])->name('delete-medias');
});


// Route::get('/{any}', function () {
//     return view('notFound');
// })->where('any', '.*');
