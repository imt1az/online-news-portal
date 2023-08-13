<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BannnerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\SeoSettings;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\SeoSetting;
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

Route::get('/', [IndexController::class, 'Index']);





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Start Admin MiddlWare
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashBoard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

});

// End Admin MiddlWare

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)
    ->name('admin.login');
Route::get('/admin/logout/page', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');

// Start Admin MiddlWare
Route::middleware(['auth', 'role:admin'])->group(function () {

    //  Admin Section
    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/admin','AllAdmin')->name('all.admin');
        Route::get('/add/admin','AddAdmin')->name('add.admin');
        Route::post('/admin/store','StoreAdmin')->name('admin.store');
        Route::get('/edit/admin/{id}','EditAdmin')->name('edit.admin');
        Route::post('/udapte/admin','UpdateAdmin')->name('update.admin');
        Route::get('/delete/admin/{id}','DeleteAdmin')->name('delete.admin');
                // Active Or Inactive
        Route::get('/inactive/admin/{id}','InactiveAdmin')->name('inactive.admin');
        Route::get('/active/admin/{id}','ActiveAdmin')->name('active.admin');

        
    });

    // Admin Permission
    Route::controller(RolesController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('permission.store');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        // Role
        Route::get('/all/role','AllRole')->name('all.role');
        Route::get('/add/role','AddRole')->name('add.role');
        Route::post('/store/role','StoreRole')->name('role.store');
        Route::get('/edit/role/{id}','EditRole')->name('edit.role');
        Route::post('/update/role','UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}','DeleteRole')->name('delete.role');


        Route::get('/add/role/permission','AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store','StoreRolesPermission')->name('role.permission.store');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all.roles.permission');
      


      });


    // Create All Category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/category', 'StoreCategory')->name('category.store');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('category.update');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');

        // SubCategory Route
        Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory');

        Route::get('/delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory');
        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');

    });


    // Create News post
    Route::controller(NewsPostController::class)->group(function () {
        Route::get('/all/news/post', 'AllNews')->name('all.news.post');
        Route::get('/add/news/post', 'AddNewsPost')->name('add.news.post');
        Route::post('/store/news', 'StoreNews')->name('store.news.post');
        Route::get('/edit/news/{id}', 'EditNews')->name('edit.newspost');
        Route::get('/delete/news/{id}', 'DeleteNews')->name('delete.newspost');
        Route::post('/update/news', 'UpdateNews')->name('update.news.post');
        Route::get('/inactive/news/{id}', 'InactiveNews')->name('inactive.news.post');
        Route::get('/active/news/{id}', 'ActiveNews')->name('active.news.post');
        Route::get('/nonspecial/news/{id}', 'NonSpecialNews')->name('nonspecial.newspost');
        Route::get('/special/news/{id}', 'SpecialNews')->name('special.newspost');

        // Multi Image Operation
        Route::get('/multiImg/delete/{id}', 'MultiImageDelete')->name('news.multiImg.delete');
        Route::post('/multiImg/update', 'MultiImageUpdate')->name('update-multi-image');

    });


    // Advertisement
    Route::controller(BannnerController::class)->group(function () {
        Route::get('/all/banner/post', 'AllBanner')->name('all.banner.post');
        Route::post('/update/banner', 'UpdateBanner')->name('update.banner');


    });
    // Photo Gallery
    Route::controller(PhotoController::class)->group(function () {
        Route::get('/all/photo/post', 'AllPhoto')->name('all.photo.gallery');
        Route::get('/add/photo/post', 'AddPhoto')->name('add.photo.gallery');
        Route::post('/store/photo/post', 'StorePhoto')->name('photo.store');

        Route::get('/edit/photo/gallery/{id}', 'EditPhoto')->name('edit.photo.gallery');
        Route::post('/update/photo/gallery', 'UpdatePhoto')->name('Updatephoto.store');
        Route::get('/delete/photo/gallery/{id}', 'DeletePhoto')->name('delete.photo.gallery');



    });
    // Video Gallery
    Route::controller(VideoController::class)->group(function () {
        Route::get('/all/video/post', 'AllVideo')->name('all.video.gallery');
        Route::get('/add/video/post', 'AddVideo')->name('add.video.gallery');
        Route::post('/add/video/post', 'StoreVideo')->name('video.store');
        Route::get('/edit/video/post/{id}', 'EditVideo')->name('edit.video.gallery');
        Route::post('/update/video/post', 'UpdateVideo')->name('update.video');
        Route::get('/delete/video/post/{id}', 'DeleteVideo')->name('delete.video.gallery');

        //    Live Tv
        Route::get('/update/live/tv', 'UpdateTv')->name('update.live.tv');
        Route::post('/store/live/tv', 'StoreTv')->name('store.live.tv');


    });

    //Review Controller
    Route::controller(ReviewController::class)->group(function(){
          Route::post('/store/review','StoreReview')->name('store.review');
          Route::get('/all/review','AllReview')->name('all.review');
    });
    //Seo Controller
    Route::controller(SeoSettings::class)->group(function(){
        
          Route::get('/seo/setting','SeoSetting')->name('seo.setting');
          Route::post('/seo/update','SeoUpdate')->name('seo.update');
    });




});
// End Admin MiddlWare


//   Access For All

Route::get('/news/details/{id}/{slug}', [IndexController::class, 'NewsDetails']);
Route::get('/news/category/{id}/{slug}', [IndexController::class, 'Catewise']);
Route::get('/news/subCategory/{id}/{slug}', [IndexController::class, 'Subwise']);
Route::post('/search', [IndexController::class, 'SearchByDate'])->name('search-by-date');


//  End Access For All

// Start Gallery Link

Route::get('/news/category/gallery',[IndexController::class,'GalleryWise'])->name('gallery');

// End Gallery Link