<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model {

    protected $table = 'Uploads';
    protected $primaryKey = "Id";
    protected $fillable = ['File', 'Type', 'Size','EmailId'];
    public $timestamps = false;

}
