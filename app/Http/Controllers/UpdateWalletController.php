<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class UpdateWalletController extends Controller
{
    public function show()
    {
        // show all wallets
        
        $userId = auth()->user()->id;
        $wallets = Wallet::get()->where('user_id', $userId);

        return view('wallets', ['wallets' => $wallets]);
    }

    public function showBalence($walletId)
    {
        // show wallet balence
        
        return view('walletBalence');
    }

    public function store(Request $req)
    {
        # code...
    }
}
