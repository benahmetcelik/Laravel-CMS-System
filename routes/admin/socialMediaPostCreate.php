<?php

use Illuminate\Support\Facades\Route;


Route::post('/',    [App\Http\Controllers\Admin\WaterMarkController::class,'imageWatermark'])->name('create');
