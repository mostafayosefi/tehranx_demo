<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceDiscount extends Model
{

    protected $fillable = [
        'name','code',
        'status','price',
    ];

}
