<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\Frontend\BerandaController::class, 'index'])->name('beranda.index');
Route::get('/tentang', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('tentang.index');
Route::get('/belanja', [App\Http\Controllers\Frontend\ShopController::class, 'index'])->name('belanja.index');
Route::get('/belanja/detail', [App\Http\Controllers\Frontend\ShopController::class, 'detail'])->name('belanja.detail');
Route::get('/kontak', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('kontak.index');


Auth::routes();

Route::middleware(['auth', 'user-access:Pemilik,Administrator,Pelanggan'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');

    Route::post('/alamat/kabupaten', [App\Http\Controllers\Backend\AddressController::class, 'getKabupaten'])->name('alamat.get-kabupaten');
    Route::post('/alamat/kabupaten', [App\Http\Controllers\Backend\AddressController::class, 'getKabupaten'])->name('alamat.get-kabupaten');
    Route::post('/alamat/kecamatan', [App\Http\Controllers\Backend\AddressController::class, 'getKecamatan'])->name('alamat.get-kecamatan');
    Route::post('/alamat/desa', [App\Http\Controllers\Backend\AddressController::class, 'getDesa'])->name('alamat.get-desa');
    Route::get('/alamat', [App\Http\Controllers\Backend\AddressController::class, 'index'])->name('alamat.index');
    Route::get('/alamat/tambah', [App\Http\Controllers\Backend\AddressController::class, 'create'])->name('alamat.create');
    Route::post('/alamat', [App\Http\Controllers\Backend\AddressController::class, 'store'])->name('alamat.store');
    Route::get('/alamat/{id}/edit', [App\Http\Controllers\Backend\AddressController::class, 'edit'])->name('alamat.edit');
    Route::post('/alamat/{id}', [App\Http\Controllers\Backend\AddressController::class, 'update'])->name('alamat.update');
    Route::delete('/alamat/{id}', [App\Http\Controllers\Backend\AddressController::class, 'destroy'])->name('alamat.destroy');

    Route::get('/kategori', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/tambah', [App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('kategori.create');
    Route::get('/kategori/{id}/edit', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('kategori.store');
    Route::delete('/kategori/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/produk', [App\Http\Controllers\Backend\ProductController::class, 'index'])->name('produk.index');
    Route::get('/produk/tambah', [App\Http\Controllers\Backend\ProductController::class, 'create'])->name('produk.create');
    Route::post('/produk', [App\Http\Controllers\Backend\ProductController::class, 'store'])->name('produk.store');
    Route::post('/produk/updateActiveStatus', [App\Http\Controllers\Backend\ProductController::class, 'updateActiveStatus'])->name('produk.updateActiveStatus');
    Route::get('/produk/{id}/edit', [App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/{id}', [App\Http\Controllers\Backend\ProductController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [App\Http\Controllers\Backend\ProductController::class, 'destroy'])->name('produk.destroy');

    Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/change/password', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/profile/settings/', [App\Http\Controllers\Backend\ProfileController::class, 'settingsProfile'])->name('profile.settings');
    Route::post('/profile/settings/delete-photo', [App\Http\Controllers\Backend\ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    Route::post('/profile/delete/account', [App\Http\Controllers\Backend\ProfileController::class, 'deleteAccount'])->name('profile.deleteAccount');

    Route::get('/pengguna', [App\Http\Controllers\Backend\UsersController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna', [App\Http\Controllers\Backend\UsersController::class, 'store'])->name('pengguna.store');
    Route::post('/pengguna/updateActiveStatus', [App\Http\Controllers\Backend\UsersController::class, 'updateActiveStatus'])->name('pengguna.updateActiveStatus');
    Route::get('/pengguna/{id}/edit', [App\Http\Controllers\Backend\UsersController::class, 'edit'])->name('pengguna.edit');
    Route::delete('/pengguna/{id}', [App\Http\Controllers\Backend\UsersController::class, 'destroy'])->name('pengguna.destroy');

    Route::get('/pelanggan', [App\Http\Controllers\Backend\CustomersController::class, 'index'])->name('pelanggan.index');
    Route::post('/pelanggan', [App\Http\Controllers\Backend\CustomersController::class, 'store'])->name('pelanggan.store');
    Route::post('/pelanggan/updateActiveStatus', [App\Http\Controllers\Backend\CustomersController::class, 'updateActiveStatus'])->name('pelanggan.updateActiveStatus');
    Route::get('/pelanggan/{id}/edit', [App\Http\Controllers\Backend\CustomersController::class, 'edit'])->name('pelanggan.edit');
    Route::delete('/pelanggan/{id}', [App\Http\Controllers\Backend\CustomersController::class, 'destroy'])->name('pelanggan.destroy');
});
