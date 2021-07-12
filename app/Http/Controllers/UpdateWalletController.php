<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Balence;

class UpdateWalletController extends Controller
{
    public function showWallets()
    {
        // show all wallets
        
        $userId = auth()->user()->id;
        $wallets = Wallet::get()->where('user_id', $userId);

        return view('wallets', ['wallets' => $wallets]);
    }


    public function addBalenceGet($walletId)
    {
        // add new balence

        return view('addBalence', ['walletId' => $walletId]);
    }

    public function addBalencePost(Request $req, $walletId)
    {
        // store new balletnce in wallet

        $req->validate([
            'balence' => 'required|between:0, 999999999:999|max:12',
        ]);

        // get total from DB
        $userId = auth()->user()->id;
        $wallets = Wallet::get()->where('user_id', $userId);
        $total = $wallets[0]['total'];

        // Check + or -
        $balence = $req->balence;
        if($req->input('submit') == "minus"){
            $balence = -$balence;
        }

        // Make new total value
        $total += $balence;
        
        if($total < 0){
            $msg = "You are Debtor.";
        }
        else{
            $msg = "Your balence successfully stored.";
        }

        // Store new balence in Balence
        $balence = Balence::create([
            'wallet_id'   => $walletId,
            'balance' => $balence,
            'total'   => $total
        ]);

        // update 'total' in Wallet
        Wallet::whereId($walletId)->update(['total' => $total]);

        return view('addBalence', ["walletId" => $walletId, "msg" => $msg]);
    }

    public function balenceDetails($walletId)
    {
        // show all wallet logs
        
        $balances = Balence::get()->where('wallet_id', $walletId);
        
        return view('balenceDetails', ['balances' => $balances]);
    }


    public function deleteWallet($walletId)
    {
        // delete wallet

        Wallet::destroy($walletId);
    
        return redirect('wallets');
    }
}
