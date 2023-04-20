<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold_history extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function market(){
        return $this->hasOne(market::class,'id','market_id');
    }
}
