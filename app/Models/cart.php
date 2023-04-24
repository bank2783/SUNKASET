<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'product_id',
        'product_front_descript',
        'total_price',
        'product_amount',
        'product_img',
        'market_id',
        'pay_image'
    ];

    public function market(){
        return $this->hasOne(market::class,'id','market_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function Warehouse(){
        return $this->hasOne(Warehouse::class,'id','user_id');
    }

    


}
