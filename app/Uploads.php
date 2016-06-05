<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model {

    protected $table = 'Upload';
    protected $primaryKey = "Id";
    protected $fillable = ['File', 'Type', 'Size','EmailId'];
    public $timestamps = false;

}
