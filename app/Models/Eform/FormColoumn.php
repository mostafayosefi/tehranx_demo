<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormColoumn extends Model
{

    protected $fillable = [
        'form_id', 'form_field_id', 'name', 'place', 'priority', 'status',
    ];


    public function form(){
        return $this->belongsTo(Form::class);
    }

    public function form_field(){
        return $this->belongsTo(FormField::class);
    }


    public function form_coloumn_mults(){
        return $this->hasMany(FormColoumnMult::class , 'form_coloumn_id');
    }


    public function form_data(){
        return $this->hasOne(FormData::class , 'form_coloumn_id');
    }



    public function form_data_mult(){
        return $this->hasOne(FormDataMult::class , 'form_coloumn_id');
    }



}
