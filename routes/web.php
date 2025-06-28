<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard ;
use App\Http\Controllers\Admin\CategoryController ;

Route::get('/admin/dashboard',[Dashboard::class , "index"])->name('index');

Route::get('/admin/category',[CategoryController::class , "showCategory"])->name('Category');




