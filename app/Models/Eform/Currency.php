<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{

    protected $fillable = [
        'name', 'status', 'link',  'rate',  'image',
    ];


    public function forms(){
        return $this->hasMany(Form::class , 'form_currency_id');
    }


    public function currency(){
        return $this->hasOne(PriceFee::class , 'currency_id');
    }




}
