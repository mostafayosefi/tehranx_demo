<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authentication extends Model
{

    protected $fillable = [  'user_id' ,  'status' ,
       'email' ,   'email_verify' ,  'email_code_verify' ,
       'tell' ,   'tell_verify' , 'tell_code_verify' ,
       'tells' ,   'tells_verify'  , 'tells_code_verify' ,
       'cardmelli' ,   'cardmelli_verify' ,
       'selfi' ,   'selfi_verify' ,
       'passport' ,   'passport_verify' ,
       'document' ,   'document_verify' ,
     ];


    public function user() {
        return $this->belongsTo(User::class );
    }


}
