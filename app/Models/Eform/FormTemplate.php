<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTemplate extends Model
{

    protected $fillable = [
        'name', 'status', 'link',  'image',
    ];


    public function forms(){
        return $this->hasMany(Form::class , 'form_template_id');
    }

}
