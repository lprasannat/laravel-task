<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model {

    protected $table = "Log";
    protected $primaryKey = "Id";
    protected $fillable = ['userAgent', 'ip', 'name', 'Email', 'version', 'LoginTime', 'platform','pattern'];

}
