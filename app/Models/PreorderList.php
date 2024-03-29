<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreorderList extends Model
{
    use HasFactory;
    protected $fillable =[
        'pre_list_price',
        'pre_list_amount',
        'status'
     ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function TransportData(){
        return $this->hasOne(TransportData::class,'id','transport_id');
    }
}
