<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;
    protected $table = 'client';
    public $timestamps = false;
    protected $fillable = [
        'cpf',
        'card',
        'status'
    ];
}
