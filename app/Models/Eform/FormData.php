<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{

    protected $fillable = [
        'form_coloumn_id', 'form_data_list_id', 'data',
    ];

    public function form_coloumn(){
        $this->belongsTo(FormColoumn::class);
    }


    public function form_data_list(){
        $this->belongsTo(FormDataList::class);
    }

}
