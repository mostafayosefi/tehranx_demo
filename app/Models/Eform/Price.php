<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    protected $fillable = [
        'money','currency',
    ];



    public function form_data_lists(){
        return $this->hasMany(FormDataList::class , 'price_id');
    }
 


}
