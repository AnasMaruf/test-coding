<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

Route::get('/register-page', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login-page', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login-page', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//Voucher
Route::get('/', [VoucherController::class, 'index'])->middleware('auth');
Route::get('/voucher/history', [VoucherController::class, 'history'])->middleware('auth');
Route::get('/voucher/histories/filterVoucherClaim/{kategori}',[VoucherController::class, 'filterVoucherClaim'])->middleware('auth');
Route::get('/voucher/fetchAllHistories', [VoucherController::class, 'fetchAllHistories'])->middleware('auth');
Route::get('/voucher/fetchVoucherClaimed', [VoucherController::class, 'fetchVoucherClaimed'])->middleware('auth');
Route::delete('/voucher/deleteHistory/{id}', [VoucherController::class, 'deleteHistory'])->middleware('auth');

Route::get('/voucher/fetchAllVouchers', [VoucherController::class, 'fetchAllVouchers'])->middleware('auth');
Route::get('/voucher/filterVoucher/{kategori}', [VoucherController::class, 'filterVoucher'])->name('voucher.filter')->middleware('auth');
Route::post('/voucher/claim/{id}', [VoucherController::class, 'claim'])->middleware('auth');



