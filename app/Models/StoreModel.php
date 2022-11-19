<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{
    use HasFactory;
    protected $table = 'store';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'representative'
    ];
}
