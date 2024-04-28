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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth', 'user-access:Owner,Administrator,Pelanggan'])->group(function () {
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


    Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/change/password', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::post('/profile/settings/', [App\Http\Controllers\Backend\ProfileController::class, 'settingsProfile'])->name('profile.settings');
    Route::post('/profile/settings/delete-photo', [App\Http\Controllers\Backend\ProfileController::class, 'deletePhoto'])->name('profile.deletePhoto');
    Route::post('/profile/delete/account', [App\Http\Controllers\Backend\ProfileController::class, 'deleteAccount'])->name('profile.deleteAccount');
});
