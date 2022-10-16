<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubcategory extends Model
{



    protected $fillable = [
        'name', 'status', 'link', 'text', 'image','form_category_id',
    ];


    public function form_category(){
        return $this->belongsTo(FormCategory::class);
    }


    public function forms(){
        return $this->hasMany(Form::class , 'form_subcategory_id');
    }



}
