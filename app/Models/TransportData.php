<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportData extends Model
{
    use HasFactory;

    protected $fillable =[
        'first_name',
        'last_name',
        'phone_number',
        'postal_code',
        'address',
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
