<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\ThemeController::class,'index'])->name('index');
Route::get('/editDetails/{theme_id}/{group_id}',    [App\Http\Controllers\Admin\ThemeController::class,'editDetails'])->name('editDetails');
Route::get('/editTheme/{id}',    [App\Http\Controllers\Admin\ThemeController::class,'editTheme'])->name('editTheme');
Route::post('/create',    [App\Http\Controllers\Admin\ThemeController::class,'create'])->name('create');
Route::post('/findTheme',    [App\Http\Controllers\Admin\ThemeController::class,'findTheme'])->name('findTheme');
Route::post('/statusUpdate', [App\Http\Controllers\Admin\ThemeController::class,'statusUpdate'  ])->name('statusUpdate');
Route::post('/detailsStore/', [App\Http\Controllers\Admin\ThemeController::class,'detailsStore'  ])->name('detailsStore');

