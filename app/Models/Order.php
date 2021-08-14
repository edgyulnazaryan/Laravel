<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employer;
class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
    [
        'date',
        'deliver',
        'status',
        'product_id',
        'employer_id',
    ];
    public function employer_order()
    {
        return $this->hasOne('App\Models\Employer', 'id', 'employer_id');
    }
    public function  product_order()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
