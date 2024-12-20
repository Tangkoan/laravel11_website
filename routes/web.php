<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use Illuminate\Http\Request;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\DemoController;



//Image Intervetion
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;



// Home(index for frontend)
Route::controller(DemoController::class)->group(function(){
        Route::get('/', 'HomeMain')->name('home');
});


// Image Intervention
Route::get('image-upload', [ImageController::class, 'index']);
Route::post('image-upload', [ImageController::class, 'store'])->name('image.store');

// Route::get('/', function () {
//     return view('frontend.index');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');

        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');
    });

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
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');

    Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
    //frontend
    Route::get('/about', 'HomeAbout')->name('home.about');
});


// Porfolio Controller
Route::controller(PortfolioController::class)->group(function(){
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.portfolio');


    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');

    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');

    // Route for Frontend
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
    Route::get('/portfolio', 'HomePortfolio')->name('home.portfolio');
});

// BlogCategory
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/all/blog/category', 'AllCategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddCategory')->name('add.blog.category');
    Route::post('/store/blog/category', 'StoreCategory')->name('store.boge.category');

    

    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');

    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
});

Route::delete('/category/{id}', [BlogCategoryController::class, 'deleteCategory']); // សម្រាប់Delete Category ហើយអ្វីដែលជាប់និងCategoryនេះនិងត្រូវលុបចោល
// Blog
Route::controller(BlogController::class)->group(function(){
    Route::get('/all/blog', 'AllBlog')->name('all.blog');
    
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');

    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');

    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');

    // frontend 
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');
     Route::get('/blog', 'HomeBlog')->name('home.blog');
    

    // Route::get('/add/blog/category', 'AddCategory')->name('add.blog.category');
    // Route::post('/store/blog/category', 'StoreCategory')->name('store.boge.category');


    // Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    // Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');

    // Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
});

// FooterController
Route::controller(FooterController::class)->group(function(){
    Route::get('/footer/setup', 'FooterSetup')->name('footersetup');
    
    Route::post('/update/footer', 'UpdateFooter')->name('update.footer');
});

// Contact 
Route::controller(ContactController::class)->group(function(){
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');

    // backend (Admin)
    Route::get('/conatact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/conatact/message/{id}', 'DeleteMessage')->name('delete.message');
});

require __DIR__.'/auth.php';
