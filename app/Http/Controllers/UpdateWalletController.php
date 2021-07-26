<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Balence;

use Illuminate\Support\Facades\Auth;


class UpdateWalletController extends Controller
{
    public function showWallets()
    {
        // show all wallets
        
        // Get authenticated users wallets from DB
        //$userId = auth()->user()->id;
        //$wallets = Wallet::get()->where('user_id', $userId);

        // Get authenticated users wallets from DB
        $wallets = Auth::user()->wallets()->get();

        return view('wallets', ['wallets' => $wallets]);
    }


    public function addBalenceGet($walletId)
    {
        // add new balence

        return view('addBalence', ['walletId' => $walletId]);
    }


    public function addBalencePost(Request $req, $walletId)
    {
        // stores new balletnce in wallet

        $req->validate([
            'balence' => 'required|between:0,999999999:999|max:12',
        ]);

        // get total balance of wallet from DB
        $total = Auth::user()->wallets()->where('id', $walletId)->get('total');
        $total = $total[0]["total"];

        // Check + or -
        $balence = $req->balence;
        if($req->input('submit') == "minus"){
            // Negetive balance amount
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
        
        // Get from Balence all values where wallet_id == $walletId
        $balances = Balence::with('wallet')->where('wallet_id', $walletId)->get();
        
        return view('balenceDetails', ['balances' => $balances]);
    }


    public function deleteWallet($walletId)
    {
        // delete wallet
        // ??????????????????????????????
        Wallet::destroy($walletId);
    
        return redirect('wallets');
    }
}
