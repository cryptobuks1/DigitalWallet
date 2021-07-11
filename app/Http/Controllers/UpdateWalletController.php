<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateWalletController extends Controller
{
    public function show()
    {
        // show all wallets
        return view('wallets');
    }

    public function store(Request $req)
    {
        # code...
    }
}
