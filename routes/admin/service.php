<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\ServicesController::class,'index'])->name('index');
Route::get('/create',    [App\Http\Controllers\Admin\ServicesController::class,'create'])->name('create');
Route::post('/store',    [App\Http\Controllers\Admin\ServicesController::class,'store'])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\ServicesController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\ServicesController::class,'update'  ])->name('update');
Route::post('/statusUpdate',    [App\Http\Controllers\Admin\ServicesController::class,'statusUpdate'])->name('statusUpdate');

