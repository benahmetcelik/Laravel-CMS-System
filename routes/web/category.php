<?php

use Illuminate\Support\Facades\Route;


Route::get('/{category}',[App\Http\Controllers\Web\CategoryController::class,'search'])->name('search');
