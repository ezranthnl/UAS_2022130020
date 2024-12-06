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

use App\Http\Controllers\auth\RegisterController;




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

Route::middleware(['auth'])->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
