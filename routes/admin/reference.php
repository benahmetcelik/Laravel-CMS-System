<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\ReferenceController::class,'index'])->name('index');
Route::get('/create',    [App\Http\Controllers\Admin\ReferenceController::class,'create'])->name('create');
Route::post('/store',    [App\Http\Controllers\Admin\ReferenceController::class,'store'])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\ReferenceController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\ReferenceController::class,'update'  ])->name('update');
Route::post('/statusUpdate',    [App\Http\Controllers\Admin\ReferenceController::class,'statusUpdate'])->name('statusUpdate');

