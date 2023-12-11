<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;



Route::get('/', [HomeController::class, 'index']);
Route::get('/layanan', [HomeController::class, 'layanan'])->name('semualayanan');
Route::get('/about',function (){
    return view('home.about');
});

Route::get('/test', function(){
    return view ('home.test');
});



Route::middleware(['role:user'])->group(function () {
    Route::get('/daftar-vendor',[UserController::class ,'formvendor'])->name('jadivendor');
    Route::post('/daftar-vendor',[UserController::class ,'daftar'])->name('daftar');
});

Route::middleware(['role:vendor'])->group(function () {
    Route::get('/vendor', [VendorController::class,'index'])->name('vendor.index');
    Route::get('/form',[PesananController::class,'index'])->name('formpesanan');
    Route::post('/form',[PesananController::class,'form'])->name('prosespesanan');
    Route::get('/profil',[PesananController::class,'show'])->name('profil');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/datalayanan', [AdminController::class, 'layanan'])->name('datalayanan');
    Route::get('/datavendor',[AdminController::class, 'vendor'])->name('datavendor');
});

// GOOGLE LOGIN
Route::get('/auth/redirect',[SocialController::class,'redirect'])->name('googlelogin');
Route::get('/google/callback',[SocialController::class,'callback'])->name('googlecallback');
// login normal
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/login',[LoginController::class ,'login'])->name('login');
Route::post('/login',[LoginController::class ,'proseslogin'])->name('proseslogin');

Route::get('/register',[RegisterController::class ,'index'])->name('tampilanregister');
Route::post('/register',[RegisterController::class ,'register'])->name('register');
