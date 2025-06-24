<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;

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
require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home-page');
Route::middleware('auth', "admin")->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');


    Route::get('/admin/abouts', [AboutController::class, 'edit'])->name('edit-about');
    Route::patch('/admin/abouts', [AboutController::class, 'update'])->name('update-about');

    Route::get('/admin/medias', [MediaController::class, 'index'])->name('index-media');
    Route::post('/admin/medias/store', [MediaController::class, 'store'])->name('store-medias');
    Route::delete('/admin/delete/', [MediaController::class, 'destroy'])->name('delete-medias');

    Route::get('/admin/services', [ServiceController::class, 'index'])->name('index-services');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('store-services');
    Route::get('/admin/services/edit/{id}', [ServiceController::class, 'edit'])->name('edit-services');
    Route::post('/admin/services/update', [ServiceController::class, 'update'])->name('update-services');
    Route::delete('/admin/services/delete', [ServiceController::class, 'destroy'])->name('delete-services');

    Route::get('/admin/skills', [SkillController::class, 'index'])->name('index-skills');
    Route::post('/admin/skills', [SkillController::class, 'store'])->name('store-skills');
    Route::get('/admin/skills/edit/{id}', [SkillController::class, 'edit'])->name('edit-skills');
    Route::post('/admin/skills/update', [SkillController::class, 'update'])->name('update-skills');
    Route::post('/admin/skills/delete', [SkillController::class, 'destroy'])->name('delete-skills');

    // Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    //     Route::get('/educations', [EducationController::class, 'index'])->name('index-educations');
    //     Route::post('/educations/store', [EducationController::class, 'store'])->name('store-educations');
    //     Route::get('/educations/edit/{id}', [EducationController::class, 'edit'])->name('edit-educations');
    //     Route::put('/educations/update', [EducationController::class, 'update'])->name('update-educations');
    //     Route::delete('/educations/delete', [EducationController::class, 'destroy'])->name('delete-educations');
    // });


  
Route::get('/admin/educations', [EducationController::class, 'index'])->name('index-educations');
Route::post('/admin/educations/store', [EducationController::class, 'store'])->name('store-educations');
Route::get('/admin/educations/edit/{id}', [EducationController::class, 'edit'])->name('edit-educations');
Route::put('/admin/educations/update', [EducationController::class, 'update'])->name('update-educations');
Route::delete('/admin/educations/delete', [EducationController::class, 'destroy'])->name('delete-educations');


     Route::get('/admin/experiences', [ExperienceController::class, 'index'])->name('index-experiences');
     Route::post('/admin/experiences/store', [ExperienceController::class, 'store'])->name('store-experiences');
    Route::put('/admin/experiences/update', [ExperienceController::class, 'update'])->name('update-experiences');
     Route::delete('/admin/experiences/delete', [ExperienceController::class, 'destroy'])->name('delete-experiences');



});



// Route::get('/{any}', function () {
//     return view('notFound');
// })->where('any', '.*');
