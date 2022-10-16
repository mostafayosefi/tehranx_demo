<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{

    protected $fillable = [
        'name', 'multi',
    ];


    public function form_coloumn(){
        return $this->hasOne(FormColoumn::class , 'form_field_id');
    }


}
