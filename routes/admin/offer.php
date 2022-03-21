<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\OfferController::class,'index'])->name('index');
Route::get('/create',    [App\Http\Controllers\Admin\OfferController::class,'create'])->name('create');
Route::post('/store',    [App\Http\Controllers\Admin\OfferController::class,'store'])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\OfferController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\OfferController::class,'update'  ])->name('update');
Route::post('/statusUpdate',    [App\Http\Controllers\Admin\OfferController::class,'statusUpdate'])->name('statusUpdate');

