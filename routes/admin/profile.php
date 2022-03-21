<?php

use Illuminate\Support\Facades\Route;


Route::get('/edit',    [App\Http\Controllers\Admin\ProfileController::class,'edit'    ])->name('edit');
Route::post('/update', [App\Http\Controllers\Admin\ProfileController::class,'update'  ])->name('update');

