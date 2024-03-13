<?php

use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductAController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\PromoAController;
use App\Http\Controllers\OrderAController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CetakController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'index']);
    Route::get('/admin/admin', [UserController::class, 'admin'])->middleware('userAkses:admin');        
    Route::get('/admin/user', [UserController::class, 'user'])->middleware('userAkses:user');
    
    Route::get('/logout', [SesiController::class, 'logout']);
    
    Route::resource('/admin/kategori', CategoryController::class )->middleware('userAkses:admin');
    Route::resource('/admin/pengguna', PenggunaController::class )->middleware('userAkses:admin');
    Route::resource('/admin/menu', ProductController::class )->middleware('userAkses:admin');
    Route::resource('/admin/promo', PromoController::class )->middleware('userAkses:admin');
    Route::resource('/admin/orderan', OrderController::class )->middleware('userAkses:admin');
    Route::resource('/admin/cetak-order', CetakController::class)->middleware('userAkses:admin');    
    
    Route::resource('/user/menu', ProductAController::class )->middleware('userAkses:user');
    Route::resource('/user/promo', PromoAController::class )->middleware('userAkses:user');
    Route::resource('/user/order', OrderAController::class )->middleware('userAkses:user');
    // Route::view('/admin/cetak-laporan', 'Order.cetak');
});
// Route::get('/admin/orderan/view/pdf', [OrderController::class, 'view_pdf']);


