<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{


    protected $fillable = [
        'title', 'from', 'to', 'fromshow', 'toshow', 'status', 'user_id',
    ];




    public function user() {
        return $this->belongsTo(User::class );
    }


    public function messages()
    {
        return $this->hasMany(Message::class , 'ticket_id' );
    }






}
