<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PemesananController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.home');
});
Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('/about', function () {
    return view('user.about');
});

Route::get('barang', [BarangController::class, 'index']);
Route::get('tambah/barang', [BarangController::class, 'create']);
Route::post('tambah/barang/store', [BarangController::class, 'store']);
Route::get('hapus/barang/{id}', [BarangController::class, 'destroy']);
Route::get('edit/barang/{id}', [BarangController::class, 'edit']);
Route::post('tambah/barang/update', [BarangController::class, 'update']);


Route::get('pemesanan', [PemesananController::class, 'index']);
Route::get('konfirmasi/pemesanan/{id}', [PemesananController::class, 'update']);
Route::get('hapus/pemesanan/{id}', [PemesananController::class, 'hapus']);


Route::get('tambah/keranjang/{id_barang}', [ShopController::class, 'masukKeranjang']);


Route::get('keranjang', [ShopController::class, 'keranjang']);

Route::get('detail/produk/{id}', [ShopController::class, 'show']);
Route::get('shop', [ShopController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');