<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_images extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_name',
        'product_id',
        'status',
        'main_image'
    ];
}
