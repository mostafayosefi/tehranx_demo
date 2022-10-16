<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceFinical extends Model
{




    protected $fillable = [
        'form_data_list_id', 'fee', 'sum','price','discount',
    ];


    public function form_data_list(){
        return $this->belongsTo(FormDataList::class);
    }


}
