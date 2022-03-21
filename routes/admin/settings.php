<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\SettingsController::class,'index'])->name('index');
Route::post('/update', [App\Http\Controllers\Admin\SettingsController::class,'update'  ])->name('update');
Route::post('/logo_update', [App\Http\Controllers\Admin\SettingsController::class,'logo_update'  ])->name('logo_update');


