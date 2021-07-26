<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balence extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'balance',
        'total',
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
