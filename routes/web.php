<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\UserController;

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

// Route untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/scan', [BarcodeController::class, 'scan'])->name('barcode.scan');

    Route::resource('users', UserController::class);
    Route::resource('area', AreaController::class);
    Route::resource('listbarang', ListBarangController::class);
});
