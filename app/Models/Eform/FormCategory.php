<?php

namespace App\Models\Eform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormCategory extends Model
{


    protected $fillable = [
        'name', 'status', 'link', 'image','text',
    ];


    public function form_subcategories(){
        return $this->hasMany(FormSubcategory::class , 'form_category_id');
    }


}
