<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiMayarController;
use App\Http\Controllers\DonasiMidtransController;
use App\Http\Controllers\Landing\LandingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;

// Program
use App\Http\Controllers\Admin\ProgramController;
// Donasi
use App\Http\Controllers\Admin\AdminDonasiController;
// Anak Asuh
use App\Http\Controllers\Admin\AnakAsuhController;
// Banner
use App\Http\Controllers\Admin\BannerController;
// Profile
use App\Http\Controllers\Admin\ProfileController;
// Visi
use App\Http\Controllers\Admin\VisiController;
// Misi
use App\Http\Controllers\Admin\MisiController;
// Kepengurusan
use App\Http\Controllers\Admin\KepengurusanController;
// Tujuan
use App\Http\Controllers\Admin\TujuanController;
// Admin
use App\Http\Controllers\Admin\SuperController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Landing
Route::get('/', [LandingController::class, 'beranda'])->name('beranda');
Route::get('/program', [LandingController::class, 'program'])->name('program');
Route::get('/donasi', [LandingController::class, 'donasi'])->name('donasi');
Route::get('/donasi/proses/{id}', [LandingController::class, 'donasi_step_two'])->name('donasi_step_two');
Route::get('/donasi/selesai', [LandingController::class, 'donasi_step_three'])->name('donasi_step_three');
Route::get('/anak', [LandingController::class, 'anak'])->name('anak');
Route::get('/kepengurusan', [LandingController::class, 'kepengurusan'])->name('kepengurusan');

// Pembayaran
// Route::post('/pembayaran', [DonasiMayarController::class, 'create_payment'])->name('pembayaran');
// Route::post('/pembatalan', [DonasiMayarController::class, 'cancel_payment'])->name('pembatalan');
Route::post('/pembayaran', [DonasiMidtransController::class, 'createPayment'])->name('pembayaran');
Route::post('/pembatalan', [DonasiMidtransController::class, 'cancel'])->name('pembatalan');
Route::post('/trial/notification', [DonasiMidtransController::class, 'notification'])->name('notification');

// Dashboard
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_aksi', [LoginController::class, 'login_aksi'])->name('login_aksi');
Route::get('/logout_aksi', [LoginController::class, 'logout_aksi'])->name('logout_aksi');

// Lupa Password
Route::get('/lupa_password', [LoginController::class, 'lupa_password'])->name('lupa_password');
Route::post('/lupa_password_aksi', [LoginController::class, 'lupa_password_aksi'])->name('lupa_password_aksi');
Route::get('/ganti_password', [LoginController::class, 'ganti_password'])->name('ganti_password');
Route::post('/ganti_password_aksi', [LoginController::class, 'ganti_password_aksi'])->name('ganti_password_aksi');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // Super Admin
    Route::get('/dashboard/superadmin', [SuperController::class, 'superadmin'])->name('admin_superadmin');
    // Tambah
    Route::get('/dashboard/superadmin/tambah', [SuperController::class, 'add_superadmin'])->name('add_superadmin');
    Route::post('/dashboard/superadmin/tambah_aksi', [SuperController::class, 'add_superadmin_aksi'])->name('add_superadmin_aksi');
    // Edit
    Route::get('/dashboard/superadmin/edit', [SuperController::class, 'edit_superadmin'])->name('edit_superadmin');
    Route::post('/dashboard/superadmin/edit_aksi', [SuperController::class, 'edit_superadmin_aksi'])->name('edit_superadmin_aksi');
    // Hapus
    Route::get('/dashboard/superadmin/hapus', [SuperController::class, 'delete_superadmin_aksi'])->name('delete_superadmin_aksi');

    // Program
    Route::get('/dashboard/program', [ProgramController::class, 'program'])->name('admin_program');
    // Tambah
    Route::get('/dashboard/program/tambah', [ProgramController::class, 'add_program'])->name('add_program');
    Route::post('/dashboard/program/tambah_aksi', [ProgramController::class, 'add_program_aksi'])->name('add_program_aksi');
    // Edit
    Route::get('/dashboard/program/edit', [ProgramController::class, 'edit_program'])->name('edit_program');
    Route::post('/dashboard/program/edit_aksi', [ProgramController::class, 'edit_program_aksi'])->name('edit_program_aksi');
    // Hapus
    Route::get('/dashboard/program/hapus', [ProgramController::class, 'delete_program_aksi'])->name('delete_program_aksi');

    // Donasi
    Route::get('/dashboard/donasi', [AdminDonasiController::class, 'donasi'])->name('admin_donasi');
    // Tambah
    Route::get('/dashboard/donasi/tambah', [AdminDonasiController::class, 'add_donasi'])->name('add_donasi');
    Route::post('/dashboard/donasi/tambah_aksi', [AdminDonasiController::class, 'add_donasi_aksi'])->name('add_donasi_aksi');
    // Edit
    Route::get('/dashboard/donasi/edit', [AdminDonasiController::class, 'edit_donasi'])->name('edit_donasi');
    Route::post('/dashboard/donasi/edit_aksi', [AdminDonasiController::class, 'edit_donasi_aksi'])->name('edit_donasi_aksi');
    // Hapus
    Route::get('/dashboard/donasi/hapus/{id}', [AdminDonasiController::class, 'delete_donasi_aksi'])->name('delete_donasi_aksi');

    // Anak Asuh
    Route::get('/dashboard/anak', [AnakAsuhController::class, 'anak'])->name('admin_anak');
    // Tambah
    Route::get('/dashboard/anak/tambah', [AnakAsuhController::class, 'add_anak'])->name('add_anak');
    Route::post('/dashboard/anak/tambah_aksi', [AnakAsuhController::class, 'add_anak_aksi'])->name('add_anak_aksi');
    // Edit
    Route::get('/dashboard/anak/edit', [AnakAsuhController::class, 'edit_anak'])->name('edit_anak');
    Route::post('/dashboard/anak/edit_aksi', [AnakAsuhController::class, 'edit_anak_aksi'])->name('edit_anak_aksi');
    // Hapus
    Route::get('/dashboard/anak/hapus/{id}', [AnakAsuhController::class, 'delete_anak_aksi'])->name('delete_anak_aksi');

    // Gambar Anak Asuh
    // Tambah
    Route::get('/dashboard/anak/tambah_gambar', [AnakAsuhController::class, 'add_gambar_anak'])->name('add_gambar_anak');
    Route::post('/dashboard/anak/tambah_gambar_aksi', [AnakAsuhController::class, 'add_gambar_anak_aksi'])->name('add_gambar_anak_aksi');
    // Edit
    Route::get('/dashboard/anak/edit_gambar', [AnakAsuhController::class, 'edit_gambar_anak'])->name('edit_gambar_anak');
    Route::post('/dashboard/anak/edit_gambar_aksi', [AnakAsuhController::class, 'edit_gambar_anak_aksi'])->name('edit_gambar_anak_aksi');
    // Hapus
    Route::get('/dashboard/anak/hapus_gambar/{id}', [AnakAsuhController::class, 'delete_gambar_anak_aksi'])->name('delete_gambar_anak_aksi');

    // Kepengurusan
    Route::get('/dashboard/kepengurusan', [KepengurusanController::class, 'kepengurusan'])->name('admin_kepengurusan');
    // Tambah
    Route::get('/dashboard/kepengurusan/tambah', [KepengurusanController::class, 'add_kepengurusan'])->name('add_kepengurusan');
    Route::post('/dashboard/kepengurusan/tambah_aksi', [KepengurusanController::class, 'add_kepengurusan_aksi'])->name('add_kepengurusan_aksi');
    // Edit
    Route::get('/dashboard/kepengurusan/edit', [KepengurusanController::class, 'edit_kepengurusan'])->name('edit_kepengurusan');
    Route::post('/dashboard/kepengurusan/edit_aksi', [KepengurusanController::class, 'edit_kepengurusan_aksi'])->name('edit_kepengurusan_aksi');
    // Hapus
    Route::get('/dashboard/kepengurusan/hapus/{id}', [KepengurusanController::class, 'delete_kepengurusan_aksi'])->name('delete_kepengurusan_aksi');

    // Beranda - Banner
    // Tambah
    Route::get('/dashboard/beranda/banner/tambah', [BannerController::class, 'add_banner'])->name('add_banner');
    Route::post('/dashboard/beranda/banner/tambah_aksi', [BannerController::class, 'add_banner_aksi'])->name('add_banner_aksi');
    // Edit
    Route::get('/dashboard/beranda/banner/edit', [BannerController::class, 'edit_banner'])->name('edit_banner');
    Route::post('/dashboard/beranda/banner/edit_aksi', [BannerController::class, 'edit_banner_aksi'])->name('edit_banner_aksi');
    // Hapus
    Route::get('/dashboard/beranda/banner/hapus/{id}', [BannerController::class, 'delete_banner_aksi'])->name('delete_banner_aksi');

    // Beranda - Profile
    // Tambah & Edit
    Route::get('/dashboard/beranda/profile/tambah', [ProfileController::class, 'add_profile'])->name('add_profile');
    Route::get('/dashboard/beranda/profile/edit', [ProfileController::class, 'edit_profile'])->name('edit_profile');
    Route::post('/dashboard/beranda/profile/simpan_aksi', [ProfileController::class, 'simpan_profile_aksi'])->name('simpan_profile_aksi');

    // Beranda - Visi
    // Tambah & Edit
    Route::get('/dashboard/beranda/visi/tambah', [VisiController::class, 'add_visi'])->name('add_visi');
    Route::get('/dashboard/beranda/visi/edit', [VisiController::class, 'edit_visi'])->name('edit_visi');
    Route::post('/dashboard/beranda/visi/simpan_aksi', [VisiController::class, 'simpan_visi_aksi'])->name('simpan_visi_aksi');

    // Beranda - Misi
    // Tambah
    Route::get('/dashboard/beranda/misi/tambah', [MisiController::class, 'add_misi'])->name('add_misi');
    Route::post('/dashboard/beranda/misi/tambah_aksi', [MisiController::class, 'add_misi_aksi'])->name('add_misi_aksi');
    // Edit
    Route::get('/dashboard/beranda/misi/edit', [MisiController::class, 'edit_misi'])->name('edit_misi');
    Route::post('/dashboard/beranda/misi/edit_aksi', [MisiController::class, 'edit_misi_aksi'])->name('edit_misi_aksi');
    // Hapus
    Route::get('/dashboard/beranda/misi/hapus/{id}', [MisiController::class, 'delete_misi_aksi'])->name('delete_misi_aksi');

    // Beranda - Tujuan
    // Tambah
    Route::get('/dashboard/beranda/tujuan/tambah', [TujuanController::class, 'add_tujuan'])->name('add_tujuan');
    Route::post('/dashboard/beranda/tujuan/tambah_aksi', [TujuanController::class, 'add_tujuan_aksi'])->name('add_tujuan_aksi');
    // Edit
    Route::get('/dashboard/beranda/tujuan/edit', [TujuanController::class, 'edit_tujuan'])->name('edit_tujuan');
    Route::post('/dashboard/beranda/tujuan/edit_aksi', [TujuanController::class, 'edit_tujuan_aksi'])->name('edit_tujuan_aksi');
    // Hapus
    Route::get('/dashboard/beranda/tujuan/hapus/{id}', [TujuanController::class, 'delete_tujuan_aksi'])->name('delete_tujuan_aksi');
});
