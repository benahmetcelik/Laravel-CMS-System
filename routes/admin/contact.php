<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\ContactController::class,'index'])->name('index');
Route::get('/destroy/{id}',    [App\Http\Controllers\Admin\ContactController::class,'destroy'])->name('destroy');
Route::get('/show/{id}',    [App\Http\Controllers\Admin\ContactController::class,'show'    ])->name('show');
Route::post('/statusUpdate',    [App\Http\Controllers\Admin\ContactController::class,'statusUpdate'])->name('statusUpdate');

