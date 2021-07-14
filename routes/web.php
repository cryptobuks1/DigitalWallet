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


Route::middleware('FirstWalletCheck')->group(function() {

    // show all wallets
    Route::get('/wallets', [UpdateWalletController::class, 'showWallets'])->name('wallets');

    // show addBalences page
    Route::get('/addBalenceGet/{walletId}', [UpdateWalletController::class, 'addBalenceGet'])->name('addBalence');

    // show balences
    Route::get('/balenceDetails/{walletId}', [UpdateWalletController::class, 'balenceDetails']);

    // add balences
    Route::post('/addBalancePost/{walletId}', [UpdateWalletController::class, 'addBalencePost'])->name('addBalancePost');

    // delete
    Route::get('/deleteWallet/{walletId}', [UpdateWalletController::class, 'deleteWallet'])->name('deleteWallet');
});


require __DIR__.'/auth.php';
