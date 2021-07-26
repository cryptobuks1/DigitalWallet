<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory; 

    protected $fillable = [
        'user_id',
        'wallet_name',
        'cash_name',
        'credit_card',
        'total',
    ];

    /**
     * Get the Balance associated with the Wallet.
     */
    public function balences()
    { 
        // Each wallet has may balences
        return $this->hasMany(Balence::class);
    }
}
