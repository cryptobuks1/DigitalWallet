<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UpdateWalletController;

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
    return view('home');
})->name('home');


// show dashboard
Route::get('/dashboard', [WalletController::class, 'show'])->middleware(['auth'])->name('dashboard');

// make new wallet
Route::post('/newWallet', [WalletController::class, 'store'])->name('newWallet');


// show all wallets
Route::get('/wallets', [UpdateWalletController::class, 'show'])->name('wallets');

// update wallets
Route::post('/updateWallet', [UpdateWalletController::class, 'store'])->name('updateWallet');


require __DIR__.'/auth.php';
