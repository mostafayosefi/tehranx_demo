<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{

    protected $fillable = [  'shaba' ,
    'card' , 'user_id', 'bank_id' ,'image' ,'status' , 'default' ,
     ];

     public function user() {
        return $this->belongsTo(User::class );
    }


    public function bank(){
        return $this->belongsTo(Bank::class);
    }



}
