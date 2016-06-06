<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    protected $table = 'Country';
    protected $primaryKey = "Id";
    protected $fillable = ['ContinentId', 'CountryName', 'CountryCode', 'CountryAlias', 'CountryDialCode', 'CreatedAt', 'IsActive'];

    public function Continent() {

        return $this->belongsTo('App\Continent', 'ContinentId');
    }

    public function State() {

        return $this->hasMany('App\State', 'CountryId');
    }

    public function City() {

        return $this->hasMany('App\City', 'StateId');
    }

    public function Cities() {

        return $this->hasManyThrough('App\City', 'App\State', 'CountryId', 'Id');
    }

    public function likes() {
        return $this->morphMany('App\City', 'likeable');
    }

}
