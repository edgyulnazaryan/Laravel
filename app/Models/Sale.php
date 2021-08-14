<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
        [
            'order_id',
            'employer_id',
            'product_id',
            'summary',
        ];
}
