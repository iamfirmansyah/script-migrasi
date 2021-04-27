<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kerja extends Model
{
    public $incrementing = false;
    protected $table = 'profile_workplace_main';
    protected $fillable = ['id','user_id','employee_status','workplace','address','city','position','certificate_number','file_document','note','telephone_number','fax_number','created_by','updated_by','validity_period_sip','practice_encode','practice_schedule'];
}
