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
Route::get('/kabupaten/{id}', [Home::class, 'detailKabupaten']);
Route::get('/desa', [Home::class, 'desa']);
Route::get('/desa/{id}', [Home::class, 'detailDesa']);
Route::get('/destinasi/{id}', [Home::class, 'destinasi']);
Route::middleware(['auth'])->group(
    function () {
        Route::get('/pesan/{id}', [Home::class, 'pesan']);
        Route::post('/proses-pesan/{id_destinasi}/{id_user}', [Home::class, 'prosesPesan']);
        Route::get('/daftar-pemesanan', [Home::class, 'daftarPemesanan']);
        Route::get('generate-pdf', [Home::class, 'pdf']);
        Route::middleware(['download-tiket'])->group(
            function () {
                Route::get('/pdf/{id}', [Home::class, 'downloadTiket']);
            }
        );
    }
);


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


// SuperAdmin
Route::middleware(['auth', 'superadmin'])->group(
    function () {
        Route::get('/superadmin', [Admin::class, 'superadmin']);
        Route::get('/superadmin/daftar-user', [Admin::class, 'user']);
        Route::put('/superadmin/ganti-banner', [Admin::class, 'gantiBanner']);
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

        // Kategori
        Route::get('/superadmin/kategori', [Admin::class, 'kategori']);
        Route::post('/superadmin/tambah-kategori',[Admin::class, 'tambahKategori']);
        Route::put('/superadmin/edit-kategori/{id}', [Admin::class, 'editKategori']);
        Route::get('/superadmin/kategori/proses-hapus/{id}', [Admin::class, 'prosesHapusKategori']);
    }
);

// Admin Kabupaten
Route::middleware(['auth', 'admin-kabupaten'])->group(
    function () {
        Route::get('/admin-kabupaten', [Admin::class, 'adminKabupaten']);
        Route::get('/admin-kabupaten/edit-profil/{id}', [Admin::class, 'editProfilAdminKabupaten']);
        Route::put('/admin-kabupaten/proses-edit-profil/{id}', [Admin::class, 'prosesEditProfilAdminKabupaten']);
        Route::get('/admin-kabupaten/daftar-admin', [Admin::class, 'daftarAdminKabupaten']);
        Route::get('/admin-kabupaten/destinasi', [Admin::class, 'destinasiAdminKabupaten']);
        Route::get('/admin-kabupaten/destinasi/approve/{id}', [Admin::class, 'approveDestinasiAdminKabupaten']);
        Route::get('/admin-kabupaten/destinasi/reject/{id}', [Admin::class, 'rejectDestinasiAdminKabupaten']);
    }
);

// Admin Desa
Route::middleware(['auth', 'admin-desa'])->group(
    function () {
        Route::get('/admin-desa', [Admin::class, 'adminDesa']);
        Route::get('/admin-desa/daftar-admin', [Admin::class, 'daftarAdminDestinasi']);
        Route::get('/admin-desa/daftar-admin/tambah', [Admin::class, 'tambahAdminDestinasi']);
        Route::post('/admin-desa/daftar-admin/proses-tambah', [Admin::class, 'prosesTambahAdminDestinasi']);
        Route::get('/admin-desa/daftar-admin/edit/{id}', [Admin::class, 'editAdminDestinasi']);
        Route::put('/admin-desa/daftar-admin/proses-edit/{id}', [Admin::class, 'prosesEditAdminDestinasi']);
        Route::get('/admin-desa/daftar-admin/hapus/{id}', [Admin::class, 'hapusAdminDestinasi']);
        Route::get('/admin-desa/destinasi', [Admin::class, 'destinasiAdminDesa']);
        Route::get('/admin-desa/destinasi/tambah', [Admin::class, 'tambahDestinasiAdminDesa']);
        Route::post('/admin-desa/destinasi/proses-tambah', [Admin::class, 'prosesTambahDestinasiAdminDesa']);
        Route::get('/admin-desa/destinasi/approve/{id}', [Admin::class, 'approveDestinasiAdminDesa']);
        Route::get('/admin-desa/destinasi/reject/{id}', [Admin::class, 'rejectDestinasiAdminDesa']);
        Route::get('/admin-desa/edit-profil', [Admin::class, 'editProfilAdminDesa']);
        Route::put('/admin-desa/proses-edit-profil', [Admin::class, 'prosesEditProfilAdminDesa']);
    }
);

// Admin Destinasi
Route::middleware(['auth', 'admin-destinasi'])->group(
    function () {
        Route::get('/admin-destinasi', [Admin::class, 'adminDestinasi']);
        Route::get('/admin-destinasi/konfirmasi-tiket', [Admin::class, 'konfirmasiTiket']);
        Route::get('/admin-destinasi/konfirmasi-tiket/{id}', [Admin::class, 'konfirmasiTiketId']);
        Route::get('admin-destinasi/wahana', [Admin::class, 'wahana']);
        Route::get('admin-destinasi/wahana/tambah', [Admin::class, 'tambahWahana']);
        Route::post('admin-destinasi/wahana/proses-tambah', [Admin::class, 'prosesTambahWahana']);
    }
);
// wahana


// Authenticate Admin
Route::get('/login-admin', [Authenticate::class, 'loginAdmin']);
Route::post('/proses-login-admin', [Authenticate::class, 'prosesLoginAdmin']);


// Socialite Auth
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);
