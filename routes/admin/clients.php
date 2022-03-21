<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\ClientController::class,'index'])->name('index');
Route::get('/create',    [App\Http\Controllers\Admin\ClientController::class,'create'])->name('create');
Route::post('/store',    [App\Http\Controllers\Admin\ClientController::class,'store'])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\ClientController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\ClientController::class,'update'  ])->name('update');
Route::post('/statusUpdate',    [App\Http\Controllers\Admin\ClientController::class,'statusUpdate'])->name('statusUpdate');

