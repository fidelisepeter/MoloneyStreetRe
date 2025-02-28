<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'date',
        'open_price',
        'close_price',
        'high_price',
        'low_price',
        'volume'
    ];
}
