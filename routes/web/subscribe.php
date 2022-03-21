<?php

use Illuminate\Support\Facades\Route;
use App\Business\PostCutter;


Route::post('/add',[App\Http\Controllers\Web\Subscribe::class,'add'])->name('add');
//Route::post('/store',[App\Http\Controllers\Web\ContactController::class,'store'])->name('store');

