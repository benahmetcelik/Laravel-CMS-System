<?php

use Illuminate\Support\Facades\Route;


Route::get('/',    [App\Http\Controllers\Admin\ReportsController::class,'index'    ])->name('index');

