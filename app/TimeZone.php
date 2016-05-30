<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    
    protected $table = "timezone";
    protected $primaryKey = "Id";
    protected $fillable = ['name','offset','created_at','updated_at'];

}
