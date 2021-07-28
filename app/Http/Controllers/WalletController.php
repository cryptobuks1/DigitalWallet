<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;

class WalletController extends Controller
{
    
    public function show()
    {
        // show createPage new wallet
        return view('dashboard');
    }

    public function store(Request $req){
        // store new Wallet in DB
        
        $userId = auth()->user()->id;
        
        $req->validate([
            'walletsName' => 'required|string|max:100',
            'cash' => 'required|string|max:20',
            'creditCard' => 'required|string|max:30',
        ]);
        
        $wallet = Wallet::create([
            'user_id'   => $userId,
            'wallet_name' => $req->walletsName,
            'cash_name' => $req->cash,
            'credit_card' => $req->creditCard,
        ]);

        // Flash message
        $req->session()->flash("success", "Your Wallet successfully created.");

        return view('dashboard');
    }
}
