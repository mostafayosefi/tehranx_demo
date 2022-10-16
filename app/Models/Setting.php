<?php

namespace App\Models;

use App\Models\Law;
use App\Models\Mngfinical;
use App\Models\Getwaypayment;
use App\Models\Notification\SettingSms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{


     protected $fillable = [ 'title', 'instagram' ,   'facebook', 'twitter' ,
      'youtube', 'tell' ,   'email', 'address' ,   'description', 'keyword' ,
       'fcopy', 'analatik' ,   'codetiket', 'favicon' ,   'logo',   '_token',
       'favicon',  'api',   'updated_at',     'created_at' ,   'whatsapp' , 'textheader' ,  'api' ,  ];



    public function mngfinical(){
        return $this->hasOne(Mngfinical::class , 'setting_id');
    }

    public function law(){
        return $this->hasOne(Law::class , 'id');
    }


    public function getwaypayments()
    {
        return $this->hasMany(Getwaypayment::class, 'setting_id');
    }

    public function setting_sms()
    {
        return $this->hasMany(SettingSms::class, 'setting_id');
    }




}
