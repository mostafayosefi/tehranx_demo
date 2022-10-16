<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

    protected $fillable = [
        'name', 'form_subcategory_id', 'group', 'subgroup', 'status', 'link',
        'image', 'form_currency_id', 'money', 'price','form_template_id', 'text' , 'short'
        , 'typeservice'
        , 'comision'
        , 'textrecv'
        , 'texttimerecv'
    ];


    public function form_subcategory(){
        return $this->belongsTo(FormSubcategory::class);
    }


    public function form_coloumns(){
        return $this->hasMany(FormColoumn::class , 'form_id');
    }


    public function form_data_lists()
    {
        return $this->hasMany(FormDataList::class , 'form_id' );
    }



    public function currency(){
        return $this->belongsTo(Currency::class, 'form_currency_id');
    }

    public function form_template(){
        return $this->belongsTo(FormTemplate::class);
    }


    public function typeservices(){
        return $this->belongsTo(Typeserveice::class , 'typeservice' );
    }




}
