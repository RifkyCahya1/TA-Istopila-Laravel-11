<?php

use Illuminate\Support\Facades\Route;

// Home User Page
    Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);
    Route::get('/Contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::get('/Gallery', [App\Http\Controllers\HomeController::class, 'gallery']);
    Route::get('/About', [App\Http\Controllers\HomeController::class, 'about']);

// Admin Page
Route::middleware(['auth','admin'])->group(function () {
    Route::get('/Dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/Upload', [App\Http\Controllers\AdminController::class, 'upload']);
    Route::get('/Project', [App\Http\Controllers\BookingController::class, 'adminIndex'])->name('admin.project');
    Route::post('/Project/{id}/update-status', [App\Http\Controllers\BookingController::class, 'updateStatus'])->name('admin.update-status');
});

//Upload Image 
Route::get('image-form', [App\Http\Controllers\ImageUploadController::class, 'index'])->name('image-form');
Route::post('upload', [App\Http\Controllers\ImageUploadController::class, 'upload'])->name('upload');

//Gallery
Route::get('/Couple', [App\Http\Controllers\GalleryController::class, 'couple']);
Route::get('/Wedding', [App\Http\Controllers\GalleryController::class, 'wedding']);
Route::get('/Pre-Wedding', [App\Http\Controllers\GalleryController::class, 'prewed']);

Route::get('home', function () {
    return view('home/home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/Profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/Profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/Profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/projects', [App\Http\Controllers\BookingController::class, 'adminIndex'])->name('admin.projects');
    Route::post('admin/projects/{id}/update-status', [App\Http\Controllers\BookingController::class, 'updateStatus'])->name('admin.update-status');
});


require __DIR__.'/auth.php';