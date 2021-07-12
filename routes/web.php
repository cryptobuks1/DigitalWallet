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
Route::get('/wallets', [UpdateWalletController::class, 'showWallets'])->name('wallets');

// add balences
Route::get('/addBalenceGet/{walletId}', [UpdateWalletController::class, 'addBalenceGet']);

// show balences
Route::get('/balenceDetails/{walletId}', [UpdateWalletController::class, 'balenceDetails']);

// add balences
Route::post('/addBalancePost/{walletId}', [UpdateWalletController::class, 'addBalencePost'])->name('addBalancePost');


require __DIR__.'/auth.php';
