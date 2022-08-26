<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['order_id', 'paid_amount', 'balance', 'transaction_date', 'transact_amount', 'user_id', 'payment_method'];
}
