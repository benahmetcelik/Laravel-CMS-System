<?php
use Illuminate\Support\Facades\Route;

Route::get('/',             [\App\Http\Controllers\Admin\FaqsController::class,'index'   ])->name('index');
Route::get('/create',       [\App\Http\Controllers\Admin\FaqsController::class,'create'  ])->name('create');
Route::post('/store',       [\App\Http\Controllers\Admin\FaqsController::class,'store'   ])->name('store');
Route::get('/edit/{id}',    [\App\Http\Controllers\Admin\FaqsController::class,'edit'    ])->name('edit');
Route::post('/update/{id}', [\App\Http\Controllers\Admin\FaqsController::class,'update'  ])->name('update');
Route::post('/destroy/{id}',[\App\Http\Controllers\Admin\FaqsController::class,'destroy'])->name('destroy');
Route::post('/statusUpdate',    [App\Http\Controllers\Admin\FaqsController::class,'statusUpdate'])->name('statusUpdate');




