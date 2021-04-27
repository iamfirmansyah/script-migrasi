<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $incrementing = false;
    protected $table = 'person_m';
}
