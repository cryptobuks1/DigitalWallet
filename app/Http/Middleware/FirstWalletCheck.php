<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;


class FirstWalletCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        $walletsCount = Auth::user()->wallets()->count();
        
        if($walletsCount == 0){
            return redirect()->route('dashboard');      
        }
    
        return $next($request);
    }
}
