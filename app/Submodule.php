<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submodule extends Model
{
    public $incrementing = false;
    protected $table = 'app_submodule';
    protected $primaryKey = 'submodule_id';
    protected $fillable = ['submodule_id','submodule_name','submodule_url','module_id','order_number','created_by','updated_by'];
}
