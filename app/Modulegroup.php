<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulegroup extends Model
{
    public $incrementing = false;
    protected $table = 'app_access_group';
    protected $primaryKey = 'access_group_id';
    protected $fillable = ['access_group_id','access_group_name','is_active','created_by','updated_by'];
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
