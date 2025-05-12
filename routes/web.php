<?php
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', ProductController::class);
Route::get('/dashboard/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('product/{slug}', [HomepageController::class, 'product']);
Route::get('categories',[HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);
Route::group(['prefix'=>'dashboard'], function(){
 Route::get('/',[DashboardController::class,'index'])->name('dashboard');
 Route::resource('categories',ProductCategoryController::class);
})->middleware(['auth', 'verified']);
Route::middleware(['auth'])->group(function () {
 Route::redirect('settings', 'settings/profile');
 Volt::route('settings/profile',
'settings.profile')->name('settings.profile');
 Volt::route('settings/password',
'settings.password')->name('settings.password');
 Volt::route('settings/appearance',
'settings.appearance')->name('settings.appearance');
});
require __DIR__.'/auth.php';
