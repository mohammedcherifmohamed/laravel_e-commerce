<?php

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard ;
use App\Http\Controllers\Admin\CategoryController ;
use App\Http\Controllers\Admin\ProductController ;
use App\Http\Middleware\RedirectIfUnauthenticated;
use App\Http\Controllers\Admin\AuthController;

use App\Http\Controllers\User\User_AuthController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\User\Checkout;
use App\Http\Controllers\User\ForgotPasswordController;

Route::prefix('admin')->name('admin.')->middleware(RedirectIfUnauthenticated::class)->group(function(){
    Route::get('/dashboard',[Dashboard::class , "index"])->name('index');
    
    Route::get('/category',[CategoryController::class , "showCategory"])->name('Category');
    
    Route::post('/StoreCategory',[CategoryController::class , "StoreCategory"])->name('StoreCategory');
    
    Route::get('/showEdit/{id}',[CategoryController::class , "showEdit"])->name('showEdit');
    
    Route::patch('/editPost/{id}',[CategoryController::class , "editPost"])->name('editPost');
    
    Route::get('/delete/{id}',[CategoryController::class , "delete"])->name('delete');
    
    Route::get('/showProduct',[ProductController::class , "showProduct"])->name('showProduct');
    
    Route::post('/AddProduct',[ProductController::class , "AddProduct"])->name('AddProduct');
    
    Route::get('/editProduct/{id}',[ProductController::class , "editProduct"])->name('editProduct');
    
    Route::PUT('/updateProduct/{id}',[ProductController::class , "updateProduct"])->name('updateProduct');
    
    Route::get('/deleteProduct/{id}',[ProductController::class , "deleteProduct"])->name('deleteProduct');
    
    Route::delete('/deleteImage/{id}',[ProductController::class , "deleteImage"])->name('deleteImage');

});


// Admin login form (restored to previous method, but with correct route name)
Route::get('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login');

Route::post('/admin/adminloginPost',[AuthController::class , "adminloginPost"])->name('adminloginPost');

Route::get('/admin/logout',[AuthController::class , "logout"])->name('logout');

// Admin registration form
Route::get('/admin/register', [\App\Http\Controllers\Admin\AuthController::class, 'showRegisterForm'])->name('admin.register.form');
// Admin registration submit
Route::post('/admin/register', [\App\Http\Controllers\Admin\AuthController::class, 'register'])->name('admin.register');

//  user routes

Route::get('/',[User_AuthController::class , "home"])->name('home');

Route::get('/user/shop',[ShopController::class , "index"])->name('shop');

Route::get('/user/productDetails/{slug}/{id}',[ShopController::class , "productDetails"])->name('productDetails');

Route::get('/user/Login_Register',[User_AuthController::class , "Login_Register"])->name('login');

Route::post('/user/registerPost',[User_AuthController::class , "registerPost"])->name('registerPost');

Route::post('/user/UserloginPost',[User_AuthController::class , "UserloginPost"])->name('UserloginPost');

Route::get('/user/Userlogout',[User_AuthController::class , "Userlogout"])->name('Userlogout');

// Checkout routes
Route::middleware(['auth'])->group(function () {

    Route::get('/testAuth', [\App\Http\Controllers\User\Checkout::class, 'testAuth'])->name('testAuth');
    Route::get('/checkout', [\App\Http\Controllers\User\Checkout::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout', [\App\Http\Controllers\User\Checkout::class, 'processCheckout'])->name('checkout.process');
    Route::get('/checkout/confirmation/{order}', [\App\Http\Controllers\User\Checkout::class, 'confirmation'])->name('checkout.confirmation');
    
});

Route::get('ForgetPasswordPage', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('ForgetPasswordPage');

Route::post('sendVerifucationCode', [ForgotPasswordController::class, 'sendVerifucationCode'])->name('sendVerifucationCode');

Route::post('checkToken', [ForgotPasswordController::class, 'checkToken'])->name('checkToken');


// Route::get('/send-email',function () {
//     Mail::to('mdg85505@gmail.com') 
//     ->send(new \App\Mail\SendEmail());
//     return 'Email Sent!';
// });


// yziw ompf cxbk vbib