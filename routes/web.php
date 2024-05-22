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
Route::get('/belanja/pencarian/', [App\Http\Controllers\Frontend\ShopController::class, 'search'])->name('belanja.search');
Route::get('/belanja/katalog/{slug}', [App\Http\Controllers\Frontend\ShopController::class, 'category'])->name('belanja.category');
Route::get('/belanja/detail/{slug}', [App\Http\Controllers\Frontend\ShopController::class, 'detail'])->name('belanja.detail');

Route::get('/kontak', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('kontak.store');

Route::post('/product-views', [App\Http\Controllers\Frontend\ProductViewsController::class, 'store'])->name('productViews.store');


Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/keranjang/jumlah', [App\Http\Controllers\Frontend\CartController::class, 'getCartItemCount'])->name('keranjang.jumlah');
    Route::get('/keranjang/{id}', [App\Http\Controllers\Frontend\CartController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah/{id}', [App\Http\Controllers\Frontend\CartController::class, 'addCart'])->name('keranjang.addCart');
    Route::post('/keranjang/edit/{id}', [App\Http\Controllers\Frontend\CartController::class, 'updateCartItem'])->name('keranjang.updateCartItem');
    Route::delete('/keranjang/hapus/{id}', [App\Http\Controllers\Frontend\CartController::class, 'deleteCartItem'])->name('keranjang.deleteCartItem');

    Route::post('/pembayaran', [App\Http\Controllers\Frontend\CheckoutController::class, 'directCheckout'])->name('pembayaran.directCheckout');
    Route::post('/pembayaran/get-address-details/{id}', [App\Http\Controllers\Frontend\CheckoutController::class, 'getAddressDetails'])->name('pembayaran.get-address-details');
    Route::post('/pembayaran/check-ongkir', [App\Http\Controllers\Frontend\CheckoutController::class, 'checkOngkir'])->name('pembayaran.check-ongkir');
    Route::post('/pembayaran/store', [App\Http\Controllers\Frontend\CheckoutController::class, 'store'])->name('pembayaran.store');
    Route::post('/pembayaran/store/keranjang', [App\Http\Controllers\Frontend\CheckoutController::class, 'storeCart'])->name('pembayaran.storeCart');
    Route::post('/pembayaran/keranjang', [App\Http\Controllers\Frontend\CheckoutController::class, 'cartCheckout'])->name('pembayaran.cartCheckout');

    Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/change/password', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/profile/settings/', [App\Http\Controllers\Backend\ProfileController::class, 'settingsProfile'])->name('profile.settings');
    Route::post('/profile/settings/delete-photo', [App\Http\Controllers\Backend\ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    Route::post('/profile/delete/account', [App\Http\Controllers\Backend\ProfileController::class, 'deleteAccount'])->name('profile.deleteAccount');

    Route::post('/alamat/kota', [App\Http\Controllers\Backend\AddressController::class, 'getKota'])->name('alamat.get-kota');
    Route::get('/alamat', [App\Http\Controllers\Backend\AddressController::class, 'index'])->name('alamat.index');
    Route::get('/alamat/tambah', [App\Http\Controllers\Backend\AddressController::class, 'create'])->name('alamat.create');
    Route::post('/alamat', [App\Http\Controllers\Backend\AddressController::class, 'store'])->name('alamat.store');
    Route::get('/alamat/{id}/edit', [App\Http\Controllers\Backend\AddressController::class, 'edit'])->name('alamat.edit');
    Route::post('/alamat/{id}', [App\Http\Controllers\Backend\AddressController::class, 'update'])->name('alamat.update');
    Route::delete('/alamat/{id}', [App\Http\Controllers\Backend\AddressController::class, 'destroy'])->name('alamat.destroy');

    Route::get('/transaksi', [App\Http\Controllers\Backend\CheckoutController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/{id}/detail', [App\Http\Controllers\Backend\CheckoutController::class, 'detail'])->name('transaksi.detail');

    Route::get('/rating', [App\Http\Controllers\Backend\RatingsController::class, 'index'])->name('rating.index');
});

Route::middleware(['auth', 'user-access:Administrator'])->group(function () {
    Route::get('/katalog', [App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('katalog.index');
    Route::get('/katalog/tambah', [App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('katalog.create');
    Route::get('/katalog/{id}/edit', [App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('katalog.edit');
    Route::post('/katalog', [App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('katalog.store');
    Route::delete('/katalog/{id}', [App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('katalog.destroy');

    Route::get('/transaksi/{id}/edit', [App\Http\Controllers\Backend\CheckoutController::class, 'edit'])->name('transaksi.edit');
    Route::post('/transaksi', [App\Http\Controllers\Backend\CheckoutController::class, 'store'])->name('transaksi.store');
    Route::delete('/transaksi/{id}', [App\Http\Controllers\Backend\CheckoutController::class, 'destroy'])->name('transaksi.destroy');
    Route::post('/transaksi/tolak', [App\Http\Controllers\Backend\CheckoutController::class, 'tolak'])->name('transaksi.tolak');
    Route::post('/transaksi/proses', [App\Http\Controllers\Backend\CheckoutController::class, 'proses'])->name('transaksi.proses');
    Route::post('/transaksi/selesai', [App\Http\Controllers\Backend\CheckoutController::class, 'selesai'])->name('transaksi.selesai');
    Route::post('/transaksi/update/resi', [App\Http\Controllers\Backend\CheckoutController::class, 'updateResi'])->name('transaksi.updateResi');

    Route::get('/rekening', [App\Http\Controllers\Backend\RekeningController::class, 'index'])->name('rekening.index');
    Route::get('/rekening/tambah', [App\Http\Controllers\Backend\RekeningController::class, 'create'])->name('rekening.create');
    Route::get('/rekening/{id}/edit', [App\Http\Controllers\Backend\RekeningController::class, 'edit'])->name('rekening.edit');
    Route::post('/rekening', [App\Http\Controllers\Backend\RekeningController::class, 'store'])->name('rekening.store');
    Route::delete('/rekening/{id}', [App\Http\Controllers\Backend\RekeningController::class, 'destroy'])->name('rekening.destroy');

    Route::get('/produk', [App\Http\Controllers\Backend\ProductController::class, 'index'])->name('produk.index');
    Route::get('/produk/tambah', [App\Http\Controllers\Backend\ProductController::class, 'create'])->name('produk.create');
    Route::post('/produk', [App\Http\Controllers\Backend\ProductController::class, 'store'])->name('produk.store');
    Route::post('/produk/updateActiveStatus', [App\Http\Controllers\Backend\ProductController::class, 'updateActiveStatus'])->name('produk.updateActiveStatus');
    Route::get('/produk/{id}/edit', [App\Http\Controllers\Backend\ProductController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/{id}', [App\Http\Controllers\Backend\ProductController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [App\Http\Controllers\Backend\ProductController::class, 'destroy'])->name('produk.destroy');

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

Route::middleware(['auth', 'user-access:Pelanggan'])->group(function () {
    Route::get('/rating/tambah', [App\Http\Controllers\Backend\RatingsController::class, 'create'])->name('rating.create');
    Route::post('/rating', [App\Http\Controllers\Backend\RatingsController::class, 'store'])->name('rating.store');
});

Route::middleware(['auth', 'user-access:Pemilik,Administrator'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/pesan-kontak', [App\Http\Controllers\Backend\ContactMessageController::class, 'index'])->name('pesan.index');
    Route::delete('/pesan-kontak/{id}', [App\Http\Controllers\Backend\ContactMessageController::class, 'destroy'])->name('pesan.destroy');
});

Route::middleware(['auth', 'user-access:Pemilik'])->group(function () {
    Route::get('/cetak-laporan/penjualan', [App\Http\Controllers\Report\PenjualanController::class, 'index'])->name('laporan_penjualan.index');
    Route::post('/cetak-laporan/penjualan/print', [App\Http\Controllers\Report\PenjualanController::class, 'print'])->name('laporan_penjualan.print');
});
