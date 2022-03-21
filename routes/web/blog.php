<?php

use Illuminate\Support\Facades\Route;
use App\Business\PostCutter;


Route::get('/',[App\Http\Controllers\Web\BlogController::class,'index'])->name('index');
Route::get('/page/{limit}',[App\Http\Controllers\Web\BlogController::class,'pagination'])->name('pagination');
Route::get('/search/',[App\Http\Controllers\Web\BlogController::class,'search'])->name('search');
Route::get('/{uri}',[App\Http\Controllers\Web\BlogController::class,'show'])->name('show');
