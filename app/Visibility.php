<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    public $incrementing = false;
    protected $table = 'profile_visibility_setting';
    protected $fillable = ['id','user_id','personal_info','education_info','workplace_info','street_address','created_by','updated_by'];
}