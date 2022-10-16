<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comid extends Model
{


    public function scopewherestatus($query)
{
        return $query->where([
            ['status' , '=' , 'first' ]
        ])->orderBy('id','DESC');
}



public function scopeIdDescending($query)
{
        return $query->orderBy('id','DESC');
}


    protected $fillable = [
        'title',
        'text',
        'btn',
        'status',
        'icon',
        'role',
        'image',
        'link',
    ];


}
