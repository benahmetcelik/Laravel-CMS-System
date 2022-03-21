<?php

use Illuminate\Support\Facades\Route;





Route::get('/',[App\Http\Controllers\Admin\AdminController::class,'index'])->name('home');
Route::group(['prefix'=>"/categories",'as'=>"categories."],base_path('routes/admin/categories.php'));
Route::group(['prefix'=>"/users",'as'=>"users."],base_path('routes/admin/users.php'));
Route::group(['prefix'=>"/profile",'as'=>"profile."],base_path('routes/admin/profile.php'));
Route::group(['prefix'=>"/reports",'as'=>"reports."],base_path('routes/admin/reports.php'));
Route::group(['prefix'=>"/translate",'as'=>"translate."],base_path('routes/admin/translate.php'));
Route::group(['prefix'=>"/posts",'as'=>"posts."],base_path('routes/admin/posts.php'));
Route::group(['prefix'=>"/slider",'as'=>"slider."],base_path('routes/admin/slider.php'));
Route::group(['prefix'=>"/menus",'as'=>"menus."],base_path('routes/admin/menus.php'));
Route::group(['prefix'=>"/gallery",'as'=>"gallery."],base_path('routes/admin/gallery.php'));
Route::group(['prefix'=>"/offer",'as'=>"offer."],base_path('routes/admin/offer.php'));
Route::group(['prefix'=>"/reference",'as'=>"reference."],base_path('routes/admin/reference.php'));
Route::group(['prefix'=>"/service",'as'=>"service."],base_path('routes/admin/service.php'));
Route::group(['prefix'=>"/contact",'as'=>"contact."],base_path('routes/admin/contact.php'));
Route::group(['prefix'=>"/theme",'as'=>"theme."],base_path('routes/admin/theme.php'));
Route::group(['prefix'=>"/settings",'as'=>"settings."],base_path('routes/admin/settings.php'));
Route::group(['prefix'=>"/clients",'as'=>"clients."],base_path('routes/admin/clients.php'));
Route::group(['prefix'=>"/faqs",'as'=>"faqs."],base_path('routes/admin/faqs.php'));
Route::group(['prefix'=>"/testimonials",'as'=>"testimonials."],base_path('routes/admin/testimonials.php'));
Route::group(['prefix'=>"/multilang",'as'=>"multilang."],base_path('routes/admin/multilang.php'));
Route::group(['prefix'=>"/social-media-post-create",'as'=>"socialMediaPostCreate."],base_path('routes/admin/socialMediaPostCreate.php'));
