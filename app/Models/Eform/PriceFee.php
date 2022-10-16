<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceFee extends Model
{


    protected $fillable = [
        'currency_id', 'money','price',
    ];


    public function currency(){
        return $this->belongsTo(Currency::class);
    }



}
