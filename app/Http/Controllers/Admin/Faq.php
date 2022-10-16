<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    public function scopeIdDescending($query)
{
        return $query->orderBy('id','DESC');
}


    protected $fillable = [
        'question',
        'answer',
    ];


}
