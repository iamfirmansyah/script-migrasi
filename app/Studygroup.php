<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studygroup extends Model
{
    public $incrementing = false;
    protected $table = 'study_group';
    protected $fillable = ['id_user','id_group'];
}
