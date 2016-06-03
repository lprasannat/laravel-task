<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

    protected $table = 'State';
    protected $primaryKey = "Id";
    protected $fillable = ['CountryId','StateName', 'StateCode', 'CreatedAt', 'IsActive'];

}
