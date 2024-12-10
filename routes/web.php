<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\MerchandiseSaleController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;




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



Route::get('/', [IndexController::class, 'index']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/pilih-outlet', [OutletController::class, 'index'])->name('pilih-outlet');
Route::get('/pegawais', [PegawaiController::class, 'index']);

// Route::get('/outlet/{id}', [OutletController::class, 'show'])->name('detail-outlet');
Route::get('/outlet/{id}', [OutletController::class, 'show'])->name('detail-outlet');
Route::get('/menu/{id}', [OutletController::class, 'show'])->name('menu');

Route::get('/order/create/{id}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/preview', [OrderController::class, 'preview'])->name('order.preview');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::get('/pesan/create', [PesanController::class, 'create'])->name('pesan.create');
Route::post('/pesan/store', [PesanController::class, 'store'])->name('pesan.store');

Route::get('/merchandise-sales/create', [MerchandiseSaleController::class, 'create'])->name('merchandise-sales.create');
Route::post('/merchandise-sales', [MerchandiseSaleController::class, 'store'])->name('merchandise-sales.store');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

});

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/transaksi', [AdminController::class, 'showTransactions'])->name('admin.transaksi');
        Route::get('/admin/data', [AdminController::class, 'showData'])->name('admin.data');
    });

});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
