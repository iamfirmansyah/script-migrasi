<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $incrementing = false;
    protected $fillable = [
        'id','username','name', 'email', 'password','phone_number','images','created_by', 'access_group_id','last_year'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function acc_group(){
        return $this->hasOne('App\Modulegroup');
    }
    public function identitas()
    {
        return $this->hasOne('App\Identitas','user_id');
    }
}
