<?php

use Illuminate\Support\Facades\Route;
use App\Business\PostCutter;


Route::post('/store',[App\Http\Controllers\Web\ContactController::class,'store'])->name('store');

