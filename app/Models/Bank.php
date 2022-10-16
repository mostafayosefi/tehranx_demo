<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{


    protected $fillable = [  'name' ,
       'image' , 'status' ,
     ];


    public function bank_cards(){
        return $this->hasMany(BankAccount::class , 'bank_id');
    }



}
