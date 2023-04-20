<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preorder extends Model
{
    use HasFactory;
    protected $fillable =[
       'pre_name',
       'pre_price',
       'pre_amount',
       'pre_description',
       'pre_image',
    ];
}
