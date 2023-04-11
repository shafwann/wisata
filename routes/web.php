<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Authenticate;
use App\Http\Controllers\Home;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// User
Route::get('/', [Home::class, 'index']);
Route::get('/kabupaten', [Home::class, 'kabupaten']);
Route::get('/desa', [Home::class, 'desa']);


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

// IndoRegion
Route::post('/getRegency', [Admin::class, 'getRegency'])->name('getRegency');
Route::post('/getDistrict', [Admin::class, 'getDistrict'])->name('getDistrict');
Route::post('/getVillage', [Admin::class, 'getVillage'])->name('getVillage');


Route::middleware(['auth', 'superadmin'])->group(
    function () {
        // SuperAdmin
        Route::get('/superadmin', [Admin::class, 'superadmin']);
        Route::get('/superadmin/daftar-user', [Admin::class, 'user']);
        // Admin
        Route::get('/superadmin/daftar-admin', [Admin::class, 'admin']);
        Route::get('/superadmin/daftar-admin/tambah', [Admin::class, 'tambahAdmin']);
        Route::post('/superadmin/daftar-admin/proses-tambah', [Admin::class, 'prosesTambahAdmin'])->name('prosesTambahAdmin');
        Route::get('/superadmin/daftar-admin/edit/{id}', [Admin::class, 'editAdmin']);
        Route::put('/superadmin/daftar-admin/proses-edit/{id}', [Admin::class, 'prosesEditAdmin']);
        Route::get('/superadmin/daftar-admin/hapus/{id}', [Admin::class, 'hapusAdmin']);
        // aktif nonaktif
        Route::get('/superadmin/daftar-admin/nonaktifkan-edit-admin-desa/{id}', [Admin::class, 'nonaktifEditAdminDesa']);
        Route::get('/superadmin/daftar-admin/aktifkan-edit-admin-desa/{id}', [Admin::class, 'aktifEditAdminDesa']);
        Route::get('/superadmin/daftar-admin/nonaktifkan-approve-wisata/{id}', [Admin::class, 'nonaktifApproveWisata']);
        Route::get('/superadmin/daftar-admin/aktifkan-approve-wisata/{id}', [Admin::class, 'aktifApproveWisata']);
        Route::get('/superadmin/daftar-admin/nonaktifkan-tambah-edit-admin-destinasi/{id}', [Admin::class, 'nonaktifTambahEditAdminDestinasi']);
        Route::get('/superadmin/daftar-admin/aktifkan-tambah-edit-admin-destinasi/{id}', [Admin::class, 'aktifTambahEditAdminDestinasi']);
        Route::get('/superadmin/daftar-admin/nonaktifkan-mengajukan-destinasi/{id}', [Admin::class, 'nonaktifMengajukanDestinasi']);
        Route::get('/superadmin/daftar-admin/aktifkan-mengajukan-destinasi/{id}', [Admin::class, 'aktifMengajukanDestinasi']);
        Route::get('/superadmin/daftar-admin/nonaktifkan-konfirmasi-tiket/{id}', [Admin::class, 'nonaktifKonfirmasiTiket']);
        Route::get('/superadmin/daftar-admin/aktifkan-konfirmasi-tiket/{id}', [Admin::class, 'aktifKonfirmasiTiket']);

        Route::get('/superadmin/daftar-destinasi', [Admin::class, 'destinasi']);
        // Kategori
        Route::get('/superadmin/kategori', [Admin::class, 'kategori']);
        Route::get('/superadmin/kategori/tambah', [Admin::class, 'tambahKategori']);
        Route::post('/superadmin/kategori/proses-tambah', [Admin::class, 'prosesTambahKategori']);
        Route::get('/superadmin/kategori/edit/{id}', [Admin::class, 'editKategori']);
        Route::put('/superadmin/kategori/proses-edit/{id}', [Admin::class, 'prosesEditKategori']);
        Route::get('/superadmin/kategori/proses-hapus/{id}', [Admin::class, 'prosesHapusKategori']);
    }
);

// Admin Kabupaten
Route::get('/admin-kabupaten', [Admin::class, 'adminKabupaten']);
Route::get('/admin-kabupaten/destinasi', [Admin::class, 'destinasiAdminKabupaten']);

// Admin Desa
Route::get('/admin-desa', [Admin::class, 'adminDesa']);
Route::get('/admin-desa/destinasi', [Admin::class, 'destinasiAdminDesa']);
Route::get('/admin-desa/destinasi/approve/{id}', [Admin::class, 'approveDestinasiAdminDesa']);
Route::get('/admin-desa/destinasi/reject/{id}', [Admin::class, 'rejectDestinasiAdminDesa']);

// Admin Destinasi


// Authenticate Admin
Route::get('/login-admin', [Authenticate::class, 'loginAdmin']);
Route::post('/proses-login-admin', [Authenticate::class, 'prosesLoginAdmin']);


// Socialite Auth
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);
