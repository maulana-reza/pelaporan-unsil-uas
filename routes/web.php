<?php

use Illuminate\Support\Facades\Route;

Route::impersonate();

Route::get('/', \App\Livewire\Admin\CekPelaporan::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dasbor::class)->name('dashboard');
    Route::get('/laporan-masuk', \App\Livewire\Admin\LaporanMasuk::class)->name('laporan-masuk');
    Route::get('/klasifikasi', \App\Livewire\Admin\Klasifikasi::class)->name('klasifikasi');
    Route::get('/bidang-terkait', \App\Livewire\Admin\BidangTerkait::class)->name('bidang-terkait');
});
Route::get('/buat-laporan', \App\Livewire\Pelapor\BuatLaporan::class)->name('buat-laporan');

