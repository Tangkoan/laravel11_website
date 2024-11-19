<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;

//Image Intervetion
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

// Image Intervention
Route::get('image-upload', [ImageController::class, 'index']);
Route::post('image-upload', [ImageController::class, 'store'])->name('image.store');

Route::get('/', function () {
    return view('frontend.index');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');

});

// HomeSlide
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide', 'HomeSlider')->name('home.slide');
    Route::post('/update/slide', 'UpdateSlider')->name('update.slide');
});

Route::get('/test-image', [ImageController::class, 'testImage']);
// Route::put('/update/slide', [HomeSliderController::class, 'UpdateSlider'])->name('update.slide');


Route::get('/dashboard', function () {
    return view('admin.index');  // admin = floder , index name file index.blade.php
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// About Page All Route
Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page', 'AboutPage')->name('about.slide');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');

    //frontend
    Route::get('/about', 'HomeAbout')->name('home.about');
});

require __DIR__.'/auth.php';
