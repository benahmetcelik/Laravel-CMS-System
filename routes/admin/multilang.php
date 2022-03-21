<?php

use Illuminate\Support\Facades\Route;


Route::get('/',             [App\Http\Controllers\Admin\MultilangController::class,'index'   ])->name('index');
Route::get('/create',       [App\Http\Controllers\Admin\MultilangController::class,'create'  ])->name('create');
Route::post('/store',       [App\Http\Controllers\Admin\MultilangController::class,'store'   ])->name('store');
Route::get('/edit/{lang_short}',    [App\Http\Controllers\Admin\MultilangController::class,'edit'    ])->name('edit');
Route::get('/translate/{lang_short}',    [App\Http\Controllers\Admin\MultilangController::class,'translate'    ])->name('translate');
Route::get('/translate/{lang_short}/group/{id}',    [App\Http\Controllers\Admin\MultilangController::class,'translate_group'    ])->name('translateGroup');
Route::post('/update/{id}', [App\Http\Controllers\Admin\MultilangController::class,'update'  ])->name('update');
Route::get('/destroy/{id}',[App\Http\Controllers\Admin\MultilangController::class,'destroy'])->name('destroy');
Route::post('/statusUpdate',[App\Http\Controllers\Admin\MultilangController::class,'statusUpdate'])->name('statusUpdate');
Route::post('/save-one-translate',[App\Http\Controllers\Admin\MultilangController::class,'save_one_translate'])->name('save_one_translate');





