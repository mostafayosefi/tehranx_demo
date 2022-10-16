<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Timeline;
use App\Models\BankAccount;
use App\Models\Course\Exam;
use App\Models\Course\ExamOnline;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Eform\FormDataList;
use App\Models\Course\CourseRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */



    protected $fillable = [
        'name', 'email', 'password', 'username', 'tell', 'tells', 'address', 'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function tickets()
    {
        return $this->hasMany(Ticket::class , 'user_id' );
    }


    public function form_data_lists()
    {
        return $this->hasMany(FormDataList::class , 'user_id' );
    }


    public function notification_messages(){
        return $this->hasMany(NotificationMessage::class , 'user_id');
    }

    public function authentication()
    {
        return $this->hasOne(Authentication::class , 'user_id' );
    }

    public function bank_accounts(){
        return $this->hasMany(BankAccount::class , 'user_id');
    }


    public function timelines(){
        return $this->hasMany(Timeline::class , 'user_id');
    }



}
