<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    public $incrementing = false;
    protected $table = 'master_variable_activity';
    protected $fillable = ['id','category','name_activity','lower_limit','upper_limit','created_by','updated_by'];
}
