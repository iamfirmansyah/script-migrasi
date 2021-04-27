<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    public $incrementing = false;
    protected $table = 'profile_base';
    protected $fillable = ['id','user_id','photo_profile','full_name','birth_place','birth_date','sex','religion','front_degree','back_degree','address','city','zipcode','land_phone','mobile_phone','idi_number','organization_number','membership_status','branch','study_group','created_by','updated_by'];

    public function user()
    {
    	return $this->belongsTo('App\User','id');
    }

}
