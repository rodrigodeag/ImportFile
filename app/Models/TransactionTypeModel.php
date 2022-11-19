<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionTypeModel extends Model
{
    use HasFactory;
    protected $table = 'transaction_type';
    public $timestamps = false;
    protected $fillable = [
        'description',
        'nature',
        'signal'
    ];
}
