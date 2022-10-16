<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeserveice extends Model
{

    protected $fillable = [
        'name',
    ];


    public function form()
    {
        return $this->hasOne(Form::class );
    }

}
