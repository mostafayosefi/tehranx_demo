<?php

namespace App\Models;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mngfinical extends Model
{


    protected $fillable = [  'rateusd' ,   'setting_id'  ,  ];


    public function setting(){
        return $this->belongsTo(Setting::class);
    }



}
