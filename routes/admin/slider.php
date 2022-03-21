<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\SliderController::class,'index'])->name('index');
Route::get('/create',    [App\Http\Controllers\Admin\SliderController::class,'create'])->name('create');
Route::post('/store',    [App\Http\Controllers\Admin\SliderController::class,'store'])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\SliderController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\SliderController::class,'update'  ])->name('update');
Route::post('/statusUpdate',    [App\Http\Controllers\Admin\SliderController::class,'statusUpdate'])->name('statusUpdate');

