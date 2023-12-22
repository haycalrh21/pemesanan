<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('semualayanan');

Route::get('/about',function (){return view('home.about');});
Route::get('/search',[HomeController::class,'search'])->name('carilayanan');
Route::get('/test', function(){return view ('home.test');});

Route::get('/layanan/{jenis_pesanan}', [HomeController::class, 'layanansort'])->name('layananaja');
Route::get('/vendor/layanan/{id?}', [PesananController::class, 'vendordetail'])->name('vendordetail');


Route::middleware(['role:user'])->group(function () {
    Route::get('/daftar-vendor',[UserController::class ,'formvendor'])->name('jadivendor');
    Route::post('/daftar-vendor',[UserController::class ,'daftar'])->name('daftar');
});

Route::middleware(['role:vendor'])->group(function () {
    Route::get('/vendors', [VendorController::class,'index'])->name('vendor.index');
    Route::delete('/delete/{id}',[VendorController::class,'delete'])->name('deleteiklan');
    Route::get('/form',[PesananController::class,'index'])->name('formpesanan');
    Route::post('/form',[PesananController::class,'form'])->name('prosespesanan');
    Route::get('/vendor/layanan',[PesananController::class,'vendorlayanan'])->name('vendorlayanan');
    Route::get('/vendor/profile',[VendorController::class,'profile'])->name('profile');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/datalayanan', [AdminController::class, 'layanan'])->name('datalayanan');
    Route::get('/datavendor',[AdminController::class, 'vendor'])->name('datavendor');
});





    Route::middleware(['web','guest'])->group(function () {
        Route::get('/auth/redirect',[SocialController::class,'redirect'])->name('googlelogin');
        Route::get('/google/callback',[SocialController::class,'callback'])->name('googlecallback');
        Route::get('/register', [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('prosesregister');
        Route::get('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/login', [LoginController::class, 'proseslogin'])->name('proseslogin');
    });
// Logout
Route::post('/logout',[LoginController::class,'logout'])->name('logout');


