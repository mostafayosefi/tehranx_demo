<?php

namespace App\Models;

use App\Models\User;
use App\Models\Eform\FormDataList;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timeline extends Model
{

    protected $fillable = [
        'activition',
        'flag',
        'form_data_list_id',
        'guard',
        'user_id',
        'text',
        'showadmin',
        'showuser',
    ];


    public function user() {
        return $this->belongsTo(User::class );
    }

    public function form_data_list() {
        return $this->belongsTo(FormDataList::class );
    }



}
