<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.home_dashboard');
// });

Route::get('/',[IndexController::class,'Index']);



   

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Start Admin MiddlWare
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'AdminDashBoard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store'); 
    Route::get('/admin/change/password',[AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password',[AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');

});

// End Admin MiddlWare

Route::get('/admin/login',[AdminController::class,'AdminLogin'])->middleware(RedirectIfAuthenticated::class)
->name('admin.login');
Route::get('/admin/logout/page',[AdminController::class,'AdminLogoutPage'])->name('admin.logout.page');

// Start Admin MiddlWare
  Route::middleware(['auth','role:admin'])->group(function(){
    // Create All Category
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/all/category','AllCategory')->name('all.category');
        Route::get('/add/category','AddCategory')->name('add.category');
        Route::post('/store/category','StoreCategory')->name('category.store');
        Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
        Route::post('/update/category','UpdateCategory')->name('category.update');
        Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');

        // SubCategory Route
        Route::get('/all/subcategory','AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory','AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory','StoreSubCategory')->name('store.subcategory');

        Route::get('/delete/subcategory/{id}','DeleteSubCategory')->name('delete.subcategory');
        Route::get('/subcategory/ajax/{category_id}','GetSubCategory');
       
    });


    // Create News post
    Route::controller(NewsPostController::class)->group(function(){
        Route::get('/all/news/post','AllNews')->name('all.news.post');
        Route::get('/add/news/post','AddNewsPost')->name('add.news.post');
        Route::post('/store/news','StoreNews')->name('store.news.post');
        Route::get('/edit/news/{id}','EditNews')->name('edit.newspost');
        Route::get('/delete/news/{id}','DeleteNews')->name('delete.newspost');
        Route::post('/update/news','UpdateNews')->name('update.news.post');
        Route::get('/inactive/news/{id}','InactiveNews')->name('inactive.news.post');
        Route::get('/active/news/{id}','ActiveNews')->name('active.news.post');
        
     });

      
  });
  // End Admin MiddlWare


//   Access For All

Route::get('/news/details/{id}/{slug}',[IndexController::class,'NewsDetails']);