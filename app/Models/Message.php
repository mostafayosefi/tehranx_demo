<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{


    protected $fillable = [
        'text', 'arou', 'ticket_id' ,
    ];


    public function ticket() {
        return $this->belongsTo(Ticket::class );
    }




 }
