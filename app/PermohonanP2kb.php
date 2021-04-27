<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermohonanP2kb extends Model
{
    public $incrementing = false;
    protected $table = 'request_activity';
    protected $fillable = ['id','user_id','str_number','name','birth_place','birth_date','sex','competence','date_graduation','university','start_date','end_date','is_deleted'];
}
