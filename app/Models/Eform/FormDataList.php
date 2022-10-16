<?php

namespace App\Models\Eform;

use App\Models\User;
use App\Models\Timeline;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormDataList extends Model
{

    protected $fillable = [
        'user_id','form_id',
        // 'price',
        'status','price_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function form_datas(){
        return $this->hasMany(FormData::class , 'form_data_list_id');
    }



    public function form_data_mult(){
        return $this->hasOne(FormDataMult::class , 'form_data_list_id');
    }



    public function price(){
        return $this->belongsTo(Price::class);
    }


    public function timelines(){
        return $this->hasMany(Timeline::class , 'form_data_list_id');
    }



    public function price_finical(){
        return $this->hasOne(PriceFinical::class , 'form_data_list_id');
    }




}
