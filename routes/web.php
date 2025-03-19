<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/Detail_Produk', function(){
    return "Selamat datang di halaman detail produk";
});

Route::get('/Profile', function(){  
    return "Halaman Profile";
});

Route::get('/Produk', function(){
    return "Tampilan Produk ";
});

Route::get('/Keranjang', function(){
    return "Belanjaan anda hari ini";
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
