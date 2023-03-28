<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Authenticate;
use App\Http\Controllers\Home;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes(['verify' => true]);

// Home
Route::get('/', [Home::class, 'index']);


// Authenticate User
Route::get('/login', [Authenticate::class, 'login'])->name('login');
Route::post('/proses-login', [Authenticate::class, 'prosesLogin']);
Route::get('/register', [Authenticate::class, 'register']);
Route::post('/proses-register', [Authenticate::class, 'prosesRegister']);
Route::get('/forgot-password', [Authenticate::class, 'forgotPassword']);
Route::post('/check-email', [Authenticate::class, 'checkEmail']);
Route::get('/reset-password/{id}', [Authenticate::class, 'resetPassword']);
Route::put('/proses-reset-password/{id}', [Authenticate::class, 'prosesResetPassword']);
Route::get('/logout', [Authenticate::class, 'logout']);


// SuperAdmin
Route::get('/superadmin', [Admin::class, 'superadmin'])->middleware('auth');
Route::get('/superadmin/daftar-admin', [Admin::class, 'admin'])->middleware('auth');
Route::get('/superadmin/daftar-admin/tambah', [Admin::class, 'tambahAdmin'])->middleware('auth');
Route::post('/superadmin/daftar-admin/proses-tambah', [Admin::class, 'prosesTambahAdmin'])->middleware('auth');
Route::get('/superadmin/daftar-destinasi', [Admin::class, 'destinasi'])->middleware('auth');
Route::get('/superadmin/daftar-menu', [Admin::class, 'menu'])->middleware('auth');

// Authenticate Admin
Route::get('/login-admin', [Authenticate::class, 'loginAdmin']);
Route::post('/proses-login-admin', [Authenticate::class, 'prosesLoginAdmin']);


// Socialite Auth
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);
