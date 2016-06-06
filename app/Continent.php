<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model {

    protected $table = 'Continent';
    protected $primaryKey = "Id";
    protected $fillable = ['ContinentName', 'ContinentCode', 'CreatedAt', 'IsActive'];

    public function Country() {

        return $this->hasMany('App\Country', 'ContinentId');
    }

    public function State() {

        return $this->hasMany('App\State', 'CountryId');
    }

    public function City() {

        return $this->hasMany('App\City', 'StateId');
    }

    public function Continent() {

        return $this->hasManyThrough('App\State', 'App\Country', 'ContinentId', 'Id');
    }

    public function likes() {
        return $this->morphMany('App\City', 'likeable');
    }

}
