<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormColoumnMult extends Model
{

    protected $fillable = [
        'name', 'form_coloumn_id', 'priority' , 'status',
    ];


    public function form_coloumn(){
        return $this->belongsTo(FormColoumn::class);
    }


    public function form_data_mult(){
        return $this->hasOne(FormDataMult::class , 'form_coloumn_mult_id');
    }



}
