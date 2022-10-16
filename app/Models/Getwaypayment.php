<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Getwaypayment extends Model
{

    protected $fillable = [  'name' ,   'token'  , 'merchent' , 'status' ,'setting_id' ,   ];


    public function setting()
    {
        return $this->belongsTo(Setting::class );
    }

}
