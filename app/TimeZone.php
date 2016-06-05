<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeZone extends Model
{
    
    protected $table = "TimeZone";
    protected $primaryKey = "Id";
    protected $fillable = ['name','offSet','created_at','IsActive'];

}
