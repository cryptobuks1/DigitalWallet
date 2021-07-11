<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WalletController extends Controller
{
    
    public function show()
    {
        // show createPage new wallet
        return view('dashboard');
    }

    public function store(Request $req){
        // store new Wallet in DB
        
        return $req->input();
    }
}
