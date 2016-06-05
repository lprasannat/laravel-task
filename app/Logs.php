<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model {

    protected $table = "Log";
    protected $primaryKey = "Id";
    protected $fillable = ['UserAgent', 'Ip', 'Name', 'Email', 'Version', 'LoginTime', 'Platform','Pattern'];

}
