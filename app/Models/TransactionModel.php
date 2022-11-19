<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    public $timestamps = false;
    protected $fillable = [
        'id_transaction_type',
        'date',
        'hour',
        'id_client',
        'id_store',
        'value'
    ];
}
