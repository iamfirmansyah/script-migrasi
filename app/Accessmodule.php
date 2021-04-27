<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessmodule extends Model
{
    public $incrementing = false;
    protected $table = 'app_access_module';
    protected $fillable = ['access_group_id','access_group_name','submodule_id','module_id','created_by','updated_by'];
}
