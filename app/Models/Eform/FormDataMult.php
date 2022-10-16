<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDataMult extends Model
{

    protected $fillable = [
        'form_coloumn_mult_id', 'form_coloumn_id',  'form_data_list_id', 'data',
    ];


    public function form_coloumn(){
        return $this->belongsTo(FormColoumn::class);
    }

    public function form_data_list(){
        return $this->belongsTo(FormDataList::class);
    }

    public function form_coloumn_mult(){
        return $this->belongsTo(FormColoumnMult::class);
    }


}
