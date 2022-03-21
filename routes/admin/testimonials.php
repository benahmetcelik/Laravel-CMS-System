<?php

use Illuminate\Support\Facades\Route;

Route::get('/',             [\App\Http\Controllers\Admin\TestimonialsController::class,'index'   ])->name('index');
Route::get('/create',       [\App\Http\Controllers\Admin\TestimonialsController::class,'create'  ])->name('create');
Route::post('/store',       [\App\Http\Controllers\Admin\TestimonialsController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [\App\Http\Controllers\Admin\TestimonialsController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [\App\Http\Controllers\Admin\TestimonialsController::class,'update'  ])->name('update');
Route::get('/destroy/{id}',[\App\Http\Controllers\Admin\TestimonialsController::class,'destroy'])->name('destroy');
Route::post('/statusUpdate',[\App\Http\Controllers\Admin\TestimonialsController::class,'statusUpdate'])->name('statusUpdate');

