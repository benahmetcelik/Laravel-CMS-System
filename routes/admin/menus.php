<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\MenuController::class,'index'   ])->name('index');
Route::get('/create',       [App\Http\Controllers\Admin\MenuController::class,'create'  ])->name('create');
Route::post('/store',       [App\Http\Controllers\Admin\MenuController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\MenuController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\MenuController::class,'update'  ])->name('update');
Route::get('/destroy/{id}',[App\Http\Controllers\Admin\MenuController::class,'destroy'])->name('destroy');
Route::post('/statusUpdate',[App\Http\Controllers\Admin\MenuController::class,'statusUpdate'])->name('statusUpdate');
Route::get('/editItems/{id}',    [App\Http\Controllers\Admin\MenuController::class,'editItems'    ])->name('editItems');
Route::post('/itemAddToMenu',[App\Http\Controllers\Admin\MenuController::class,'itemAddToMenu'])->name('itemAddToMenu');
Route::post('/menusApi',[App\Http\Controllers\Admin\MenuController::class,'menusApi'])->name('menusApi');




