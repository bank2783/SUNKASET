<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory;


    protected $fillable =[
        'product_name',
        'product_detail',
        'product_price',
        'product_amount',
        'product_img',
        'product_status',
        'market_id',
        'product_type_id',
    ];
    protected $primaryKey = 'product_id';




    public function market(){
        return $this->hasOne(market::class,'id','market_id');
    }
}

