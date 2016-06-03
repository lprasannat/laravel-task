<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $table = 'Country';
    protected $primaryKey = "Id";
    protected $fillable = ['ContinentId','CountryName', 'CountryCode','CountryAlias','CountryDialCode', 'CreatedAt', 'IsActive'];

}
