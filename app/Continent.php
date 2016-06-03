<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model {

    protected $table = 'Continent';
    protected $primaryKey = "Id";
    protected $fillable = ['ContinentName', 'ContinentCode', 'CreatedAt', 'IsActive'];

    public function country() {
        return $this->hasMany('App\Country', 'ContinentId');
    }

    public function state() {
        return $this->hasMany('App\State','CountryId');
    }

    public function city() {
        return $this->hasMany('App\City','StateId');
    }

}
