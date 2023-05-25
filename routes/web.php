<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdmnAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPageController;



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

Route::get('/', function () {
    return view('welcome');
});

/* Frontend */

Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('/subcategory-by-category/{id}',[HomeController::class, 'get_subcategory_by_category'])->name('subcategory-by-category');
Route::post('/search/result',[HomeController::class, 'search'])->name('search_result');
Route::get('/about',[AboutController::class, 'index'])->name('about');
Route::get('/contact',[ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email',[ContactController::class, 'send_email'])->name('contact_form_submit');
Route::get('/news-detail/{id}',[PostController::class, 'detail'])->name('news_detail');
Route::get('/category/{id}',[SubCategoryController::class, 'index'])->name('category');
Route::get('/login',[LoginController::class , 'index'])->name('login');




// Admin

Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home')->middleware('admin:admin');
Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
Route::post('admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::get('admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::post('admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

Route::get('/admin/home-advertisement', [AdmnAdvertisementController::class, 'home_ad_show'])->name('admin_home_ad_show')->middleware('admin:admin');
Route::post('/admin/home-advertisement-update', [AdmnAdvertisementController::class, 'home_ad_update'])->name('admin_home_ad_update')->middleware('admin:admin');

Route::get('/admin/category/create', [AdminCategoryController::class, 'create'])->name('admin_category_create')->middleware('admin:admin');
Route::get('/admin/category/show', [AdminCategoryController::class, 'show'])->name('admin_category_show')->middleware('admin:admin');

Route::post('/admin/category/store', [AdminCategoryController::class, 'store'])->name('admin_category_store');

Route::get('/admin/category/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_category_edit')->middleware('admin:admin');

Route::post('/admin/category/update/{id}', [AdminCategoryController::class, 'update'])->name('admin_category_update');

Route::get('/admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin_category_delete')->middleware('admin:admin');


Route::get('/admin/sub-category/create', [AdminSubCategoryController::class, 'create'])->name('admin_sub_category_create')->middleware('admin:admin');
Route::get('/admin/sub-category/show', [AdminSubCategoryController::class, 'show'])->name('admin_sub_category_show')->middleware('admin:admin');
Route::get('/admin/sub-category/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_sub_category_edit')->middleware('admin:admin');
Route::get('/admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete')->middleware('admin:admin');
Route::post('/admin/sub-category/store', [AdminSubCategoryController::class, 'store'])->name('admin_sub_category_store');
Route::post('/admin/sub-category/update/{id}', [AdminSubCategoryController::class, 'update'])->name('admin_sub_category_update');
Route::get('/admin/sub-category/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete')->middleware('admin:admin');



Route::get('/admin/post/show', [AdminPostController::class, 'show'])->name('admin_post_show')->middleware('admin:admin');
Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create')->middleware('admin:admin');

Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');

Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit')->middleware('admin:admin');

Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');

Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');




Route::get('/admin/page/about', [AdminPageController::class, 'about'])->name('admin_page_about')->middleware('admin:admin');

Route::post('/admin/page/about/update', [AdminPageController::class, 'about_update'])->name('admin_page_about_update');

Route::get('/admin/page/login', [AdminPageController::class, 'login'])->name('admin_page_login')->middleware('admin:admin');

Route::post('/admin/page/login/update', [AdminPageController::class, 'login_update'])->name('admin_page_login_update');

Route::get('/admin/page/contact', [AdminPageController::class, 'contact'])->name('admin_page_contact')->middleware('admin:admin');

Route::post('/admin/page/contact/update', [AdminPageController::class, 'contact_update'])->name('admin_page_contact_update');