<?php

use App\Http\Controllers\api\AdminApi;
use App\Http\Controllers\api\AuthenticateApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/proses-login', [AuthenticateApi::class, 'prosesLogin']);
Route::post('/proses-register', [AuthenticateApi::class, 'prosesRegister']);
Route::post('/proses-login-admin', [AuthenticateApi::class, 'prosesLoginAdmin']);
Route::put('/proses-reset-password/{id}', [AuthenticateApi::class, 'prosesResetPassword']);

// Admin
Route::get('/role', [AdminApi::class, 'role']);
Route::post('/tambah-admin', [AdminApi::class, 'tambahAdmin']);
Route::get('/user', [AdminApi::class, 'user']);
Route::get('/admin', [AdminApi::class, 'admin']);
