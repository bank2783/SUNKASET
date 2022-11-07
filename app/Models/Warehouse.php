<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_name',
        'product_amount',
        'product_price',
        'product_retail',
        'market_id',
        'product_status',
        'product_front_descrip',
        'product_type_id'
    ];

    public function market(){
        return $this->hasOne(market::class,'id','market_id');
    }
}
