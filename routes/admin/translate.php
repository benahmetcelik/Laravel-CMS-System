<?php

use Illuminate\Support\Facades\Route;


Route::post('/action',    [App\Http\Controllers\Admin\TranslateController::class,'action'])->name('action');

