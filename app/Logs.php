<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model {

    protected $table = "Logs";
    protected $primaryKey = "Id";
    protected $fillable = ['userAgent', 'ip', 'name', 'Email', 'version', 'LoginTime', 'platform','pattern'];

}
