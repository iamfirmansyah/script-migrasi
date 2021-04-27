<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public $incrementing = false;
    protected $table = 'app_module';
    protected $primaryKey = 'module_id';
    protected $fillable = ['module_id','module_name','module_order','module_icon','module_url','is_parent','created_by'];

}

