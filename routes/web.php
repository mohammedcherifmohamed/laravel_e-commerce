<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard ;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController ;
use App\Http\Controllers\Admin\ProductController ;
use App\Http\Middleware\RedirectIfUnauthenticated;


Route::middleware([RedirectIfUnauthenticated::class])->group(function(){
    Route::get('/admin/dashboard',[Dashboard::class , "index"])->name('index');
    
    Route::get('/admin/category',[CategoryController::class , "showCategory"])->name('Category');
    
    Route::post('/admin/StoreCategory',[CategoryController::class , "StoreCategory"])->name('StoreCategory');
    
    Route::get('/admin/showEdit/{id}',[CategoryController::class , "showEdit"])->name('showEdit');
    
    Route::patch('/admin/editPost/{id}',[CategoryController::class , "editPost"])->name('editPost');
    
    Route::get('/admin/delete/{id}',[CategoryController::class , "delete"])->name('delete');
    
    Route::get('/admin/showProduct',[ProductController::class , "showProduct"])->name('showProduct');
    
    Route::post('/admin/AddProduct',[ProductController::class , "AddProduct"])->name('AddProduct');
    
    Route::get('/admin/editProduct/{id}',[ProductController::class , "editProduct"])->name('editProduct');
    
    Route::PUT('/admin/updateProduct/{id}',[ProductController::class , "updateProduct"])->name('updateProduct');
    
    Route::get('/admin/deleteProduct/{id}',[ProductController::class , "deleteProduct"])->name('deleteProduct');
    
    Route::delete('/admin/deleteImage/{id}',[ProductController::class , "deleteImage"])->name('deleteImage');

});


Route::get('/',[AuthController::class , "login"])->name('login');

Route::post('/admin/loginPost',[AuthController::class , "loginPost"])->name('loginPost');

Route::get('/admin/logout',[AuthController::class , "logout"])->name('logout');



