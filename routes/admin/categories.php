<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\CategroyController::class,'index'   ])->name('index');
Route::get('/create',       [App\Http\Controllers\Admin\CategroyController::class,'create'  ])->name('create');
Route::post('/store',       [App\Http\Controllers\Admin\CategroyController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [App\Http\Controllers\Admin\CategroyController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\Admin\CategroyController::class,'update'  ])->name('update');
Route::post('/destroy',[App\Http\Controllers\Admin\CategroyController::class,'destroy'])->name('destroy');
Route::post('/statusUpdate',[App\Http\Controllers\Admin\CategroyController::class,'statusUpdate'])->name('statusUpdate');





